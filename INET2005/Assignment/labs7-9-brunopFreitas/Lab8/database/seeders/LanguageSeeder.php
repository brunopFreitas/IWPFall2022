<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'English',
            'created_at' => Carbon::now(),
            'created_by'=> 1,
        ]);
        DB::table('languages')->insert([
            'name' => 'Korean',
            'created_at' => Carbon::now(),
            'created_by'=> 1,
        ]);
        DB::table('languages')->insert([
            'name' => 'Portuguese',
            'created_at' => Carbon::now(),
            'created_by'=> 1,
        ]);
        DB::table('languages')->insert([
            'name' => 'Spanish',
            'created_at' => Carbon::now(),
            'created_by'=> 1,
        ]);
    }
}
