<?php

namespace Database\Seeders;

use App\Models\AlliedSubject;
use Illuminate\Database\Seeder;

class AlliedSubjectSeeder extends Seeder
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
                'id'                => 1,
                'mother_subject_id' => 3,
                'subject_id'        => 3,
                'active'            => true,
            ],
            [
                'id'                => 2,
                'mother_subject_id' => 3,
                'subject_id'        => 15,
                'active'            => true,
            ],
            [
                'id'                => 3,
                'mother_subject_id' => 3,
                'subject_id'        => 18,
                'active'            => true,
            ],
            [
                'id'                => 4,
                'mother_subject_id' => 4,
                'subject_id'        => 9,
                'active'            => true,
            ],
            [
                'id'                => 5,
                'mother_subject_id' => 4,
                'subject_id'        => 11,
                'active'            => true,
            ],
            [
                'id'                => 6,
                'mother_subject_id' => 6,
                'subject_id'        => 4,
                'active'            => true,
            ],
            [
                'id'                => 7,
                'mother_subject_id' => 6,
                'subject_id'        => 20,
                'active'            => true,
            ],
        ];

        foreach ($input as $data) {
            AlliedSubject::create($data);
        }
    }
}
