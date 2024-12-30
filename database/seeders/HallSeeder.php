<?php

namespace Database\Seeders;

use App\Models\ExamHall;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
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
                'hall_name' => 'B-201',
                'block_id'  => 2,
                'active'    => false,
            ],
            [
                'id'        => 2,
                'hall_name' => 'B-401',
                'block_id'  => 2,
                'active'    => true,
            ],
            [
                'id'        => 3,
                'hall_name' => 'B-301',
                'block_id'  => 2,
                'active'    => true,
            ],
            [
                'id'        => 4,
                'hall_name' => 'C-201',
                'block_id'  => 3,
                'active'    => true,
            ],
            [
                'id'        => 5,
                'hall_name' => 'C-301',
                'block_id'  => 3,
                'active'    => true,
            ],
        ];

        foreach ($input as $data) {
            ExamHall::create($data);
        }
    }
}
