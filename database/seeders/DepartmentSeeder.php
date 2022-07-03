<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'development'
            ],
            [
                'id' => 2,
                'name' => 'accounting'
            ],
            [
                'id' => 3,
                'name' => 'HR'
            ],
            [
                'id' => 4,
                'name' => 'sales'
            ],
            [
                'id' => 5,
                'name' => 'headquarters'
            ],
            [
                'id' => 6,
                'name' => 'director'
            ]
        ]);
    }
}
