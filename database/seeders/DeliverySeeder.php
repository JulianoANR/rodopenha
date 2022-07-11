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
            'address' => 'Av.Dom Pedro, Centro São Paulo',
            'zip' => '2587652',
            'date' => now(),
            'signature_required' => true,
            'contact_id' => 2,
            'service_order_id' => 1
        ]);
    }
}
