<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name'=>'Canada',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/ca-flag.gif',
            'created_at' => Carbon::now(),
        ]);
        DB::table('countries')->insert([
            'name'=>'Armenia',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/am-flag.gif',
            'created_at' => Carbon::now(),
        ]);
        DB::table('countries')->insert([
            'name'=>'Nepal',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/np-flag.gif',
            'created_at' => Carbon::now(),
        ]);
        DB::table('countries')->insert([
            'name'=>'Saint Lucia',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/st-flag.gif',
            'created_at' => Carbon::now(),
        ]);
        DB::table('countries')->insert([
            'name'=>'Brazil',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/br-flag.gif',
            'created_at' => Carbon::now(),
        ]);
    }
}
