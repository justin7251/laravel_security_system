<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->insert([
            [
                'id' => 1,
                'name' => 'The Isaac Newton building',
                'sip' => '81.10.230.31',
                'location' => 'UK'
            ],
            [
                'id' => 2,
                'name' => 'The Oscar Wilde building',
                'sip' => '29.10.109.38',
                'location' => 'UK'
            ],
            [
                'id' => 3,
                'name' => 'The Charles Darwin',
                'sip' => '12.1.214.1',
                'location' => 'UK'
            ],
            [
                'id' => 4,
                'name' => 'The Benjamin Franklin building',
                'sip' => '91.10.123.12',
                'location' => 'USA'
            ],
            [
                'id' => 5,
                'name' => 'The Luciano Pavarotti building',
                'sip' => '12.32.231.56',
                'location' => 'ITALY'
            ]
        ]);
    }
}
