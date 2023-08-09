<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $property_id = 101;
        $floors = [
            'G_Flr' => [
                'houses' => ['B-01', 'B-02', 'P-01', 'P-02', 'P-03'],
                'rent_prices' => [
                    ['B-01', 0],
                    ['B-02', 10000],
                    'default' => 20000,
                ],
                'garbage_fees' => 350,
            ],

            '1st_Flr' => [
                'houses' => ['P-04', 'P-05', 'P-06', 'P-07', 'P-08', 'P-09'],
                'rent_prices' => [
                    [['P-04', 'P-06'], 21000],
                    [['P-07'], 23000],
                    [['P-08', 'P-09'], 16500],
                    'default' => 20000,
                ],
                'garbage_fees' => 350,
            ],
            '2nd_Flr' => [
                'houses' => ['P-10', 'P-11', 'P-12', 'P-13', 'P-14', 'P-15'],
                'rent_prices' => [
                    [['P-10', 'P-11', 'P-12'], 21000],
                    [['P-13'], 24000],
                    [['P-14', 'P-15'], 16500],
                    'default' => 20000,
                ],
                'garbage_fees' => 350,
            ],
            '3rd_Flr' => [
                'houses' => ['P-16', 'P-17', 'P-18', 'P-19', 'P-20', 'P-21'],
                'rent_prices' => [
                    [['P-16'], 22000],
                    [['P-17'], 21000],
                    [['P-19'], 23000],
                    [['P-20', 'P-21'], 16000],
                    'default' => 20000,
                ],
                'garbage_fees' => 350,
            ],
            '4th_Flr' => [
                'houses' => ['P-22', 'P-23', 'P-24', 'P-25', 'P-26', 'P-27'],
                'rent_prices' => [
                    [['P-22', 'P-23'], 21000],
                    [['P-25'], 23000],
                    [['P-26', 'P-27'], 16000],
                    'default' => 20000,
                ],
                'garbage_fees' => 350,
            ],
        ];

        foreach ($floors as $floor => $details) {
            foreach ($details['houses'] as $house_number) {
                $rent_price = $details['rent_prices']['default'];
                foreach ($details['rent_prices'] as $key => $price_group) {
                    if ($key === 'default') continue;
                    if (is_array($price_group[0]) && in_array($house_number, $price_group[0])) {
                        $rent_price = $price_group[1];
                        break;
                    } elseif ($price_group[0] === $house_number) {
                        $rent_price = $price_group[1];
                        break;
                    }
                }
                DB::table('house_units')->insert([
                    'property_id' => $property_id,
                    'property_floor' => $floor,
                    'house_number_on_property' => $house_number,
                    'house_rent_price' => $rent_price,
                    'garbage_fees' => $details['garbage_fees'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
