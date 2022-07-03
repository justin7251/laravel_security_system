<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mappings')->insert([
            [
                'id' => 1,
                'from_model' => 'Employee',
                'from_id' => 1,
                'to_model' => 'Department',
                'to_id' => 1
            ],
            [
                'id' => 2,
                'from_model' => 'Employee',
                'from_id' => 1,
                'to_model' => 'Department',
                'to_id' => 6
            ],
            [
                'id' => 3,
                'from_model' => 'Employee',
                'from_id' => 2,
                'to_model' => 'Department',
                'to_id' => 2
            ],
            [
                'id' => 4,
                'from_model' => 'Employee',
                'from_id' => 2,
                'to_model' => 'Department',
                'to_id' => 5
            ],
            [
                'id' => 5,
                'from_model' => 'Building',
                'from_id' => 1,
                'to_model' => 'Department',
                'to_id' => 1
            ],
            [
                'id' => 6,
                'from_model' => 'Building',
                'from_id' => 1,
                'to_model' => 'Department',
                'to_id' => 2
            ],
            [
                'id' => 7,
                'from_model' => 'Building',
                'from_id' => 2,
                'to_model' => 'Department',
                'to_id' => 3
            ],
            [
                'id' => 8,
                'from_model' => 'Building',
                'from_id' => 2,
                'to_model' => 'Department',
                'to_id' => 4
            ],
            [
                'id' => 9,
                'from_model' => 'Building',
                'from_id' => 3,
                'to_model' => 'Department',
                'to_id' => 5
            ],
            [
                'id' => 10,
                'from_model' => 'Building',
                'from_id' => 4,
                'to_model' => 'Department',
                'to_id' => 1
            ],
            [
                'id' => 11,
                'from_model' => 'Building',
                'from_id' => 4,
                'to_model' => 'Department',
                'to_id' => 4
            ],
            [
                'id' => 12,
                'from_model' => 'Building',
                'from_id' => 5,
                'to_model' => 'Department',
                'to_id' => 1
            ],
            [
                'id' => 13,
                'from_model' => 'Building',
                'from_id' => 5,
                'to_model' => 'Department',
                'to_id' => 4
            ],
        ]);
    }
}
