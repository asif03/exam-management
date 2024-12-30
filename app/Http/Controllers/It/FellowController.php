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
use Maatwebsite\Excel\Facades\Excel;

class FellowController extends Controller
{
    use MenuTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->getMenuAccessByUser();
        $subjects = MotherSubject::where('active', true)->get();
        $fellows = Fellow::orderBy('fellow_id', 'asc')->get();

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFellowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFellowRequest $request)
    {
        //
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
        //
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

<<<<<<< HEAD
=======
    /**
     * Store a ledger excel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importFellows(Request $request)
    {
        $created_by = auth()->id();

        $file_path = $request->file('fellowExcelFile')->store('excels');
        $file_name = $request->file('fellowExcelFile')->getClientOriginalName();
        $file_extension = $request->file('fellowExcelFile')->extension();

        //dd($request->all());

        try {
            Excel::import(new FellowsImport(), $request->file('fellowExcelFile')
                    ->store('temp'));

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

        /*$file_id = DB::table('uploads')->insertGetId([
        'file_name'  => $file_name,
        'file_desc'  => $file_extension,
        'file_type'  => 'LED',
        'file_path'  => $file_path,
        'created_by' => $created_by,
        ]);

        Excel::import(new FellowsImport, 'users.xlsx');*/

        //return redirect('/')->with('success', 'All good!');
    }

>>>>>>> 937f1797ab311203d714b328e3f0736038ba8df5
}
