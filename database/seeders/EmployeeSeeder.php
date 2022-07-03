<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'id' => 1,
                'full_name' => 'Julius Caesar',
                'rfid' => '142594708f3a5a3ac2980914a0fc954f'
            ],
            [
                'id' => 2,
                'full_name' => 'Emily James',
                'rfid' => 'q5shqv3r7bptsuzs6cincoif6esrt3r9'
            ]
        ]);
    }
}
