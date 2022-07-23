<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery::create([
            'address'            => '3842 North Highway 95, lake havasu city, AZ, 86404',
            'zip'                => '86892',
            'date'               => now(),
            'notes'              => null,
            'signature_required' => 0,

            'contact_id'         => 2,
            'service_order_id'   => 1
        ]);
    }
}
