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
        //
        DB::table('countries')->insert([
            'name'=> 'Canada',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/ca-flag.gif',
            'created_at'=>Carbon::now()
        ]);
        DB::table('countries')->insert([
            'name'=> 'Albania',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/al-flag.gif',
            'created_at'=>Carbon::now()
        ]);
        DB::table('countries')->insert([
            'name'=> 'Argentina',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/ar-flag.gif',
            'created_at'=>Carbon::now()
        ]);
        DB::table('countries')->insert([
            'name'=> 'South Korea',
            'flag_img_url' => 'https://www.worldometers.info/img/flags/ks-flag.gif',
            'created_at'=>Carbon::now()
        ]);
    }
}
