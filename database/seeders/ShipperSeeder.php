<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipper::create([
            'address' => 'Av.Di Fernandi, Guarulhos',
            'zip' => '4521241241',
            'contact_id' => 3,
            'service_order_id' => 1
        ]);
    }
}
