<?php

namespace Database\Seeders;

use App\Models\MotherSubject;
use Illuminate\Database\Seeder;

class MotherSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'id'           => 1,
                'subject_name' => 'Anaesthesiology',
                'desc'         => 'Anaesthesiology',
                'sp_code'      => '11',
            ],
            [
                'id'           => 2,
                'subject_name' => 'Biochemistry',
                'desc'         => 'Biochemistry',
                'sp_code'      => '12',
            ],
            [
                'id'           => 3,
                'subject_name' => 'Medicine',
                'desc'         => 'Medicine & Allied Subjects',
                'sp_code'      => '24',
            ],
            [
                'id'           => 4,
                'subject_name' => 'Obstetrics & Gynaecology',
                'desc'         => 'Obstetrics & Gynaecology and Allied Subjects',
                'sp_code'      => '30',
            ],
            [
                'id'           => 5,
                'subject_name' => 'Paediatrics',
                'desc'         => 'Paediatric & Allied Subjects',
                'sp_code'      => '39',
            ],
            [
                'id'           => 6,
                'subject_name' => 'Surgery',
                'desc'         => 'Surgery & Allied Subjects',
                'sp_code'      => '48',
            ],
            [
                'id'           => 7,
                'subject_name' => 'Radiology & Imaging',
                'desc'         => 'Allied  subject of Radiology & Imaging',
                'sp_code'      => '45',
            ],
            [
                'id'           => 8,
                'subject_name' => 'Dental Surgery',
                'desc'         => 'Dental surgery & alleged subject',
                'sp_code'      => '93',
            ],
            [
                'id'           => 9,
                'subject_name' => 'Feto-Maternal Medicine',
                'desc'         => 'Y',
                'sp_code'      => '55',
            ],
            [
                'id'           => 10,
                'subject_name' => 'Dermatology & Venereology',
                'desc'         => 'Dermatology & Venereology & alleged subject',
                'sp_code'      => '19',
            ],
        ];

        foreach ($input as $data) {
            MotherSubject::create($data);
        }

    }
}
