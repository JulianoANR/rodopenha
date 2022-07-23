<?php

namespace Database\Seeders;

use App\Models\Pickup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pickup::create([
            'address'            => '9217 Apollo Heights Ave, Las Vegas, NV, 89110',
            'zip'                => '90210',
            'date'               => now(),
            'notes'              => null,
            'signature_required' => 1,

            'contact_id'         => 1,
            'service_order_id'   => 1
        ]);
    }
}
