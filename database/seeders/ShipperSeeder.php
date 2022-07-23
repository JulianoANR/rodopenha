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
            'address'            => '205 Riverside Dr. STE A, austin, TX, 78704',
            'zip'                => '25746',
            'notes'              => null,
            'contact_id'         => 3,
            'service_order_id'   => 1
        ]);
    }
}
