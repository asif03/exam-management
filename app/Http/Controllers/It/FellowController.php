<?php

namespace App\Http\Controllers\It;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFellowRequest;
use App\Http\Requests\UpdateFellowRequest;
use App\Imports\FellowsImport;
use App\Models\Fellow;
use App\Models\MotherSubject;
use App\Traits\MenuTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FellowController extends Controller
{
    use MenuTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFellows()
    {
        $query = "SELECT f.`id`, f.`fellowship_status_id`, fs.`fellow_status_mame`, f.`fellowship_year`, f.`fellowship_session`,
         f.`fellow_id`, f.`name`,f.`subject_id`, f.`office_add`, f.`mobile`, f.`e_mail`, f.`pnr_no`,
         f.`active`, s.`subject_name`, f.`fellowship_date`, f.`deceased`, f.`retired`, f.`lifetime_member`
         FROM `fellows` f
         INNER JOIN subjects s ON s.`id` = f.`subject_id`
         INNER JOIN fellowship_statuses fs ON fs.`id` = f.`fellowship_status_id`
         WHERE f.`fellowship_status_id` NOT IN (4)
         ORDER BY f.`id` ASC";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function getSubjectWiseFellows()
    {
        $subject_id = $_REQUEST['subject_id'];

        $query = "SELECT f.`id`, f.`fellowship_status_id`, fs.`fellow_status_mame`, f.`fellowship_year`, f.`fellowship_session`,
         f.`fellow_id`, f.`name`,f.`subject_id`, f.`office_add`, f.`mobile`, f.`e_mail`, f.`pnr_no`,
         f.`active`, s.`subject_name`, f.`fellowship_date`, f.`deceased`, f.`retired`, f.`lifetime_member`
         FROM `fellows` f
         INNER JOIN subjects s ON s.`id` = f.`subject_id`
         INNER JOIN fellowship_statuses fs ON fs.`id` = f.`fellowship_status_id`
         WHERE `subject_id` IN (SELECT `subject_id` FROM `allied_subjects`
         WHERE `mother_subject_id` = $subject_id
         ORDER BY f.`fellowship_status_id` ASC, f.`fellow_id` DESC)
         AND f.`fellowship_status_id` NOT IN (4)
         ORDER BY f.`id` ASC";

        $data = DB::select($query);
        return json_encode($data);
    }

    public function newFellowsByType()
    {
        $fellowTypeId = $_REQUEST['fellowShipTypeId'];

        if ($fellowTypeId == 1) {
            $maxFellowId = DB::table('fellows')
                ->select(DB::raw('MAX(CAST(fellow_id AS SIGNED)) as max_fellow_id'))
                ->where('fellowship_status_id', 1)
                ->value('max_fellow_id');

            $tempFellows = DB::table('fellows_pgsql')
                ->select('fellow_id', 'fellow_type_id', 'fellow_name', 'sub', 'email', 'mobile')
                ->whereRaw('CAST(fellow_id AS SIGNED) > ?', [$maxFellowId])
                ->where('fellow_type_id', 1)
                ->get();
        } elseif ($fellowTypeId == 2) {
            $tempFellows = DB::table('fellows_pgsql')
                ->select('fellow_id', 'fellow_type_id', 'fellow_name', 'sub', 'email', 'mobile')
                ->whereNotIn('fellow_id', function ($query) {
                    $query->select('fellow_id')
                        ->from('fellows')
                        ->where('fellowship_status_id', 2);
                })
                ->where('fellow_type_id', $fellowTypeId)
                ->get();
        } elseif ($fellowTypeId == 3) {
            $tempFellows = DB::table('fellows_pgsql')
                ->select('fellow_id', 'fellow_type_id', 'fellow_name', 'sub', 'email', 'mobile')
                ->whereNotIn('fellow_id', function ($query) {
                    $query->select('fellow_id')
                        ->from('fellows')
                        ->where('fellowship_status_id', 3);
                })
                ->where('fellow_type_id', $fellowTypeId)
                ->get();
        }
        return json_encode($tempFellows);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus    = $this->getMenuAccessByUser();
        $subjects = MotherSubject::where('active', true)->get();
        $fellows  = Fellow::orderBy('fellow_id', 'asc')->get();

        return view('fellows.index', [
            'subjects' => $subjects,
            'fellows'  => $fellows,
            'menus'    => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fellows.create', [
            'menus'       => $this->getMenuAccessByUser(),
            'fellowTypes' => DB::table('fellowship_statuses')->whereNotIn('id', [4])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFellowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFellowRequest $request)
    {
        $fellowShipType = $request->fellowType;

        if ($fellowShipType == 1) {
            $maxFellowId = DB::table('fellows')
                ->select(DB::raw('MAX(CAST(fellow_id AS SIGNED)) as max_fellow_id'))
                ->where('fellowship_status_id', 1)
                ->value('max_fellow_id');

            $tempFellows = DB::table('fellows_pgsql')
                ->select('fellows_pgsql.fellow_type_id AS fellowship_status_id', 'fellows_pgsql.fellowship_year', 'fellows_pgsql.fellowship_session', 'fellows_pgsql.fellow_id',
                    'fellows_pgsql.fellow_name AS name', 'subjects.id AS subject_id', 'fellows_pgsql.office_address AS office_add', 'fellows_pgsql.home_address AS home_add',
                    'fellows_pgsql.phone_office AS office_tel', 'fellows_pgsql.phone_office AS home_tel', 'fellows_pgsql.mobile AS mobile', 'fellows_pgsql.email AS e_mail',
                    'fellows_pgsql.sub', 'fellows_pgsql.desg', 'fellows_pgsql.inst', 'fellows_pgsql.remarks', 'fellows_pgsql.lifetime AS lifetime_member', 'fellows_pgsql.retired AS retired',
                    'fellows_pgsql.deceased AS deceased', 'fellows_pgsql.fellowship_date')
                ->join('subjects', 'fellows_pgsql.sub', '=', 'subjects.subject_name')
                ->whereRaw('CAST(fellows_pgsql.fellow_id AS SIGNED) > ?', [$maxFellowId])
                ->where('fellows_pgsql.fellow_type_id', 1)
                ->get();

        } else {
            $tempFellows = DB::table('fellows_pgsql')
                ->select('fellows_pgsql.fellow_type_id AS fellowship_status_id', 'fellows_pgsql.fellowship_year', 'fellows_pgsql.fellowship_session', 'fellows_pgsql.fellow_id',
                    'fellows_pgsql.fellow_name AS name', 'subjects.id AS subject_id', 'fellows_pgsql.office_address AS office_add', 'fellows_pgsql.home_address AS home_add',
                    'fellows_pgsql.phone_office AS office_tel', 'fellows_pgsql.phone_office AS home_tel', 'fellows_pgsql.mobile AS mobile', 'fellows_pgsql.email AS e_mail',
                    'fellows_pgsql.sub', 'fellows_pgsql.desg', 'fellows_pgsql.inst', 'fellows_pgsql.remarks', 'fellows_pgsql.lifetime AS lifetime_member', 'fellows_pgsql.retired AS retired',
                    'fellows_pgsql.deceased AS deceased', 'fellows_pgsql.fellowship_date')
                ->join('subjects', 'fellows_pgsql.sub', '=', 'subjects.subject_name')
                ->where('fellows_pgsql.fellow_type_id', $fellowShipType)
                ->get();
        }

        $newFellows = [];

        foreach ($tempFellows as $fellow) {
            $newFellows[] = [
                'fellowship_status_id' => $fellow->fellowship_status_id,
                'fellowship_year'      => $fellow->fellowship_year ? $fellow->fellowship_year : date('Y'),
                'fellowship_session'   => $fellow->fellowship_session ? $fellow->fellowship_session : '1st',
                'fellow_id'            => $fellow->fellow_id,
                'name'                 => $fellow->name,
                'subject_id'           => $fellow->subject_id,
                'office_add'           => $fellow->office_add,
                'home_add'             => $fellow->home_add,
                'office_tel'           => $fellow->office_tel,
                'home_tel'             => $fellow->home_tel,
                'mobile'               => $fellow->mobile,
                'e_mail'               => $fellow->e_mail,
                'sub'                  => $fellow->sub,
                'desg'                 => $fellow->desg,
                'inst'                 => $fellow->inst,
                'remarks'              => $fellow->remarks,
                'lifetime_member'      => $fellow->lifetime_member,
                'retired'              => $fellow->retired,
                'fellowship_date'      => $fellow->fellowship_date,
                'deceased'             => $fellow->deceased,
                'created_by'           => auth()->id(),
            ];
        }

        if (empty($newFellows)) {
            return redirect()->back()->with('error', 'No new fellows to insert.');
        }

        $isBulkInsert = Fellow::insert($newFellows);

        if ($isBulkInsert) {
            return redirect()->route('fellows.create')->with('success', 'Fellow created successfully.');
        }

        return redirect()->back()->with('error', 'Failed to create fellow.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function show(Fellow $fellow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function edit(Fellow $fellow)
    {
        echo 'edit fellow';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFellowRequest  $request
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFellowRequest $request, Fellow $fellow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fellow $fellow)
    {
        //
    }

    /**
     * Update or insert the specified resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  \App\Models\Fellow  $fellow
     * @return \Illuminate\Http\Response
     */
    public function uploadFellows()
    {
        $menus = $this->getMenuAccessByUser();

        return view('fellows.upload-fellows', ['menus' => $menus]);
    }

    /**
     * Store a ledger excel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importFellows(Request $request)
    {
        $created_by = auth()->id();

        $file_path      = $request->file('fellowExcelFile')->store('excels');
        $file_name      = $request->file('fellowExcelFile')->getClientOriginalName();
        $file_extension = $request->file('fellowExcelFile')->extension();

        //dd($request->all());

        try {

            DB::table('fellows_pgsql')->delete(); // Clear the fellows table before import
            Excel::import(new FellowsImport(), $request->file('fellowExcelFile')->store('temp'));

            return redirect()->back()->with('success', 'Data uploaded successfully.');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }

            dd($failure);

            return redirect()->back()->with('errors', $failure->errors());
        }
    }

    public function editBulkFellows(Request $request)
    {
        $menus       = $this->getMenuAccessByUser();
        $lastUpdated = Fellow::orderBy('updated_at', 'desc')->first();

        if ($lastUpdated->updated_at) {
            $lastUpdated = $lastUpdated->updated_at->format('Y-m-d');
        } else {
            $lastUpdated = date('Y-m-d');
        }

        // Modified fellows
        $modifiedFellows = DB::table('fellows_pgsql')
            ->select('fellows_pgsql.fellow_type_id AS fellowship_status_id', 'fellowship_statuses.fellow_status_mame', 'fellows_pgsql.fellowship_year', 'fellows_pgsql.fellowship_session', 'fellows_pgsql.fellow_id',
                'fellows_pgsql.fellow_name AS name', 'subjects.id AS subject_id', 'subjects.subject_name', 'fellows_pgsql.office_address AS office_add', 'fellows_pgsql.home_address AS home_add',
                'fellows_pgsql.phone_office AS office_tel', 'fellows_pgsql.phone_office AS home_tel', 'fellows_pgsql.mobile AS mobile', 'fellows_pgsql.email AS e_mail',
                'fellows_pgsql.sub', 'fellows_pgsql.desg', 'fellows_pgsql.inst', 'fellows_pgsql.remarks', 'fellows_pgsql.lifetime AS lifetime_member', 'fellows_pgsql.retired AS retired',
                'fellows_pgsql.deceased AS deceased', 'fellows_pgsql.fellowship_date', 'fellows_pgsql.updated_at')
            ->join('fellows', 'fellows_pgsql.fellow_id', '=', 'fellows.fellow_id')
            ->join('subjects', 'fellows.subject_id', '=', 'subjects.id')
            ->join('fellowship_statuses', 'fellows_pgsql.fellow_type_id', '=', 'fellowship_statuses.id')
            ->whereDate('fellows_pgsql.updated_at', '>', $lastUpdated)
            ->get();

        return view('fellows.edit-bulk-fellows', [
            'menus'   => $menus,
            'fellows' => $modifiedFellows,
        ]);
    }

    public function updateBulkFellows(Request $request)
    {
        $lastUpdated = Fellow::orderBy('updated_at', 'desc')->first();

        if ($lastUpdated->updated_at) {
            $lastUpdated = $lastUpdated->updated_at->format('Y-m-d');
        } else {
            $lastUpdated = date('Y-m-d');
        }

        // Modified fellows
        $modifiedFellows = DB::table('fellows_pgsql')
            ->select('fellows_pgsql.fellow_type_id AS fellowship_status_id', 'fellows_pgsql.fellowship_year', 'fellows_pgsql.fellowship_session', 'fellows_pgsql.fellow_id',
                'fellows_pgsql.fellow_name AS name', 'subjects.id AS subject_id', 'fellows_pgsql.office_address AS office_add', 'fellows_pgsql.home_address AS home_add',
                'fellows_pgsql.phone_office AS office_tel', 'fellows_pgsql.phone_office AS home_tel', 'fellows_pgsql.mobile AS mobile', 'fellows_pgsql.email AS e_mail',
                'fellows_pgsql.sub', 'fellows_pgsql.desg', 'fellows_pgsql.inst', 'fellows_pgsql.remarks', 'fellows_pgsql.lifetime AS lifetime_member', 'fellows_pgsql.retired AS retired',
                'fellows_pgsql.deceased AS deceased', 'fellows_pgsql.fellowship_date', 'fellows_pgsql.updated_at')
            ->join('fellows', 'fellows_pgsql.fellow_id', '=', 'fellows.fellow_id')
            ->join('subjects', 'fellows.subject_id', '=', 'subjects.id')
            ->whereDate('fellows_pgsql.updated_at', '>', $lastUpdated)
            ->get();

        foreach ($modifiedFellows as $fellow) {
            Fellow::where('fellow_id', $fellow->fellow_id)->update([
                'name'            => $fellow->name,
                'office_add'      => $fellow->office_add,
                'home_add'        => $fellow->home_add,
                'office_tel'      => $fellow->office_tel,
                'home_tel'        => $fellow->home_tel,
                'mobile'          => $fellow->mobile,
                'e_mail'          => $fellow->e_mail,
                'remarks'         => $fellow->remarks,
                'lifetime_member' => $fellow->lifetime_member,
                'retired'         => $fellow->retired,
                'deceased'        => $fellow->deceased,
                'updated_by'      => auth()->id(),
                'updated_at'      => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Fellows updated successfully.');
    }

}