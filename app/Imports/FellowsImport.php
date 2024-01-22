<?php

namespace App\Imports;

use App\Models\FellowPgsql;
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
        return new FellowPgsql([
            'fellow_id'        => $row['fellow_id'],
            'fellow_name'      => $row['fellow_name'],
            'fellow_type_id'   => $row['fellow_type_id'],
            'subject_id_pgsql' => $row['subject_id'],
            'fellowship_date'  => $row['fellowship_date'],
            'home_address'     => $row['home_address'],
            'office_address'   => $row['office_address'],
            'email'            => $row['email'],
            'mobile'           => $row['mobile'],
            'phone_home'       => $row['phone_home'],
            'phone_office'     => $row['phone_office'],
            'pin_no'           => $row['pin_no'],
            'sp_code'          => $row['sp_code'],
            'institute_id'     => $row['institute_id'],
            'designation_id'   => $row['designation_id'],
            'fax'              => $row['fax'],
            'lifetime'         => $row['lifetime'],
            'retired'          => $row['retired'],
            'deceased'         => $row['deceased'],
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
