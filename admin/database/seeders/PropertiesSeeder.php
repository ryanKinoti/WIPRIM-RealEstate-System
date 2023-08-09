<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('properties')->insert([
            [
                'property_identifier'=>'P',
                'property_name'=>'Pelican Apartments',
                'property_location'=>'Katani Rd. Syokimau',
                'location'=>DB::raw('ST_MakePoint(36.93444287989289, -1.3750562040125158)'), // Longitude, Latitude
                'number_of_floors'=>'5',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'property_identifier'=>'R',
                'property_name'=>'RIM House',
                'property_location'=>'Katani Rd. Syokimau',
                'location'=>DB::raw('ST_MakePoint(36.9670644663952, -1.3541471335107707)'), // Longitude, Latitude
                'number_of_floors'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
