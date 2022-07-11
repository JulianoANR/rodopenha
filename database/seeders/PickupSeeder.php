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
            'address' => 'Av.Anchieta, Centro Caraguatatuba',
            'zip' => '2587652',
            'date' => now(),
            'signature_required' => true,
            'contact_id' => 1,
            'service_order_id' => 1
        ]);
    }
}
