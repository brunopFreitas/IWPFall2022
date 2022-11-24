<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'first_name'=>'Jhon',
            'last_name' => 'Brown',
            'country_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('people')->insert([
            'first_name'=>'Matt',
            'last_name' => 'Champion',
            'country_id' => 5,
            'created_at' => Carbon::now(),
        ]);
        DB::table('people')->insert([
            'first_name'=>'Mary',
            'last_name' => 'Champman',
            'country_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
