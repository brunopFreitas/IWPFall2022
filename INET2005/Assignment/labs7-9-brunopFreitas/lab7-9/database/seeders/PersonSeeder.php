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
        //
        DB::table('people')->insert([
            'first_name'=> 'Joe',
            'last_name'=> 'Doe',
            'country_id'=>1,
            'created_at'=>Carbon::now()
        ]);
        DB::table('people')->insert([
            'first_name'=> 'Mike',
            'last_name'=> 'Miers',
            'country_id'=>2,
            'created_at'=>Carbon::now()
        ]);
        DB::table('people')->insert([
            'first_name'=> 'Rosana',
            'last_name'=> 'Highfield',
            'country_id'=>3,
            'created_at'=>Carbon::now()
        ]);
    }
}
