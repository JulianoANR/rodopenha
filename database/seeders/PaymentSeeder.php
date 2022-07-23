<?php

namespace Database\Seeders;

use App\Enums\PaymentMethodsEnum;
use App\Enums\PaymentTypesEnum;
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
        Payment::create([
            'carrier_pay'      => '500',
            'internal_notes'   => null,
            'type'             => PaymentTypesEnum::COD,
            'method'           => PaymentMethodsEnum::BUSINESS_CHECK,

            'service_order_id' => 1
        ]);
    }
}
