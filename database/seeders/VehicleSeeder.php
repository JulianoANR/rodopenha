<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{
    Vehicle
};

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'vin'              => '1D4GP25B038108775',
            'make'             => 'Toyota',
            'model'            => 'Camry',
            'year'             => '2015',
            'color'            => 'silver',
            'operable'         => 1,
            'lot_number'       => 1,
            'buyer_number'     => '(555) 2854-25685',

            'vehicle_type_id'  => 1,
            'service_order_id' => 1
        ]);

        Vehicle::create([
            'vin'              => '4Y1SL65848Z411439',
            'make'             => 'Toyota',
            'model'            => 'Corolla',
            'year'             => '2021',
            'color'            => 'black',
            'operable'         => 0,
            'lot_number'       => 2,
            'buyer_number'     => '(555) 2369-28971',

            'vehicle_type_id'  => 2,
            'service_order_id' => 1
        ]);
    }
}
