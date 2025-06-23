<?php

namespace App\Imports;

use App\Models\FellowPgsql;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class FellowsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //echo date('Y-m-d', strtotime($row['updated_at']));
        //echo $row['updated_at'] ? DateTime::createFromFormat('d/m/Y', $row['updated_at'])->format('Y-m-d') : date('Y-m-d');
        //dd($row);
        if (empty($row['fellow_id']) || empty($row['fellow_name'])) {
            return null; // Skip rows with missing required fields
        }

        if ($row['fellow_type'] == 'Fellow With Exam') {
            $fellowTypeId = 1; // Assuming 1 is the ID for 'Fellow With Exam'
        } elseif ($row['fellow_type'] == 'Fellow Without Exam') {
            $fellowTypeId = 2; // Assuming 2 is the ID for 'Fellow Without Exam'
        } elseif ($row['fellow_type'] == 'Honarary Fellow') {
            $fellowTypeId = 3; // Handle other types or set to null if not applicable
        }

        $fellowSession     = date('m', strtotime($row['fellowship_date']));
        $fellowshipSession = '';

        if ($fellowSession == '01') {
            $fellowshipSession = 'JAN';
        } elseif ($fellowSession == '07') {
            $fellowshipSession = 'JUL';
        }

        $updatedAt = $row['updated_at'] ? DateTime::createFromFormat('d/m/Y', $row['updated_at'])->format('Y-m-d') : date('Y-m-d');

        //echo $fellowshipSession;die;

        return new FellowPgsql([
            'fellow_id'          => $row['fellow_id'],
            'fellow_name'        => $row['fellow_name'],
            'fellowship_date'    => date('Y-m-d', strtotime($row['fellowship_date'])),
            'fellowship_year'    => date('Y', strtotime($row['fellowship_date'])),
            'fellowship_session' => $fellowshipSession,
            'fellow_type_id'     => $fellowTypeId,
            'office_address'     => $row['mailing_address'],
            'home_address'       => $row['officeresidence_address'],
            'mobile'             => $row['mobile'],
            //'phone_office'    => $row['phone_office'],
            //'phone_home'      => $row['phone_home'],
            //'fax'             => $row['fax'],
            'sub'                => $row['subject'],
            'inst'               => $row['institute'],
            'desg'               => $row['designation'],
            'email'              => $row['email'],
            'lifetime'           => $row['lifetime'] == true ? 'Y' : 'N',
            'deceased'           => $row['deceased'] == true ? 'Y' : 'N',
            'retired'            => $row['retired'] == true ? 'Y' : 'N',
            'updated_at'         => $updatedAt,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'fellow_id';
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    /*public function collection(Collection $rows)
{
foreach ($rows as $row) {
FellowPgsql::create([
'fellow_id'   => $row['fellow_id'],
'fellow_name' => $row['fellow_name'],
]);
}
}*/

}
