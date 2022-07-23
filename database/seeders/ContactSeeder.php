<?php

namespace Database\Seeders;

use App\Enums\ReferenceContactsEnum;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'ref'   => ReferenceContactsEnum::PICKUP,
            'type'  => 'business',

            'name'         => 'Pickup Name',
            'email'        => 'pickup@gmail.com',
            'phone'        => '(555) 2154-2736',
            'company'      => 'Pickup company',
            'working_from' => '9:00',
            'working_to'   => '18:00'
        ]);

        Contact::create([
            'ref'   => ReferenceContactsEnum::DELIVERY,
            'type'  => 'business',

            'name'         => 'Delivery Name',
            'email'        => 'delivery@gmail.com',
            'phone'        => '(555) 2154-2736',
            'company'      => 'Delivery company',
            'working_from' => '9:00',
            'working_to'   => '18:00'
        ]);

        Contact::create([
            'ref'   => ReferenceContactsEnum::SHIPPER,
            'type'  => 'personal',

            'name'         => 'Shipper Name',
            'email'        => 'shipper@gmail.com',
            'phone'        => '(555) 2154-2736',
            'company'      => null,
            'working_from' => null,
            'working_to'   => null
        ]);
    }
}
