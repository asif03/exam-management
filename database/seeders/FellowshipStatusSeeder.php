<?php

namespace Database\Seeders;

use App\Models\FellowshipStatus;
use Illuminate\Database\Seeder;

class FellowshipStatusSeeder extends Seeder
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
                'id'                  => 1,
                'fellow_status_mame	' => 'Fellow With Exam',
                'active'              => true,
            ],
            [
                'id'                  => 2,
                'fellow_status_mame	' => 'BLOCK-B',
                'active'              => true,
            ],
            [
                'id'                  => 3,
                'fellow_status_mame	' => 'BLOCK-C',
                'active'              => true,
            ],
        ];

        foreach ($input as $data) {
            FellowshipStatus::create($data);
        }
    }
}
