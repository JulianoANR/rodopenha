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
            "vin"                    => "Admin#5882574",
            "vehicle_type_id"        => 1,
            "service_order_id"        => 1,
        ]);
    }
}
