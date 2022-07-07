<?php

namespace Database\Seeders;

use App\Enums\PaymentMethodsEnum;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Payment::create([
            'carrier_pay' => '592',
            'type' => 'COD',
            'method' => PaymentMethodsEnum::BUSINESS_CHECK,
            'service_order_id' => 1
        ]);
    }
}
