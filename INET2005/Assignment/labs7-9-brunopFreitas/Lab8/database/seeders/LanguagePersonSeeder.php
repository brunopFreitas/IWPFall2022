<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_person')->insert([
            'person_id' => 1,
           'language_id' => 1,
           'created_at' => Carbon::now(),
        ]);
        DB::table('language_person')->insert([
            'person_id' => 1,
            'language_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('language_person')->insert([
            'person_id' => 2,
            'language_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('language_person')->insert([
            'person_id' => 2,
            'language_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('language_person')->insert([
            'person_id' => 3,
            'language_id' => 4,
            'created_at' => Carbon::now(),
        ]);
    }
}
