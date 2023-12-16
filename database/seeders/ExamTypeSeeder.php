<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
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
                'id'        => 1,
                'exam_type' => 'OSPE',
                'active'    => false,
            ],
            [
                'id'        => 2,
                'exam_type' => 'IOE',
                'active'    => false,
            ],
            [
                'id'        => 3,
                'exam_type' => 'OSCE',
                'active'    => false,
            ],
            [
                'id'        => 4,
                'exam_type' => 'FCPS Final OSCE',
                'active'    => true,
            ],
            [
                'id'        => 5,
                'exam_type' => 'FCPS Mid Term OSCE',
                'active'    => true,
            ],
            [
                'id'        => 6,
                'exam_type' => 'FCPS Premiminary OSCE',
                'active'    => true,
            ],
            [
                'id'        => 7,
                'exam_type' => 'FCPS Final IOE',
                'active'    => true,
            ],
        ];

        foreach ($input as $data) {
            ExamType::create($data);
        }
    }
}
