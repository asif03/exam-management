<?php

namespace Database\Seeders;

use App\Models\ExamBuildingBlock;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
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
                'id'         => 1,
                'block_name' => 'BLOCK-A',
                'active'     => false,
            ],
            [
                'id'         => 2,
                'block_name' => 'BLOCK-B',
                'active'     => true,
            ],
            [
                'id'         => 3,
                'block_name' => 'BLOCK-C',
                'active'     => true,
            ],
        ];

        foreach ($input as $data) {
            ExamBuildingBlock::create($data);
        }
    }
}
