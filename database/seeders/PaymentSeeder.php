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
            'notes'            => null,
            'carrier_pay'      => '500',
            'type'             => PaymentTypesEnum::COD,
            'method'           => PaymentMethodsEnum::BUSINESS_CHECK,

            'service_order_id' => 1
        ]);
    }
}
