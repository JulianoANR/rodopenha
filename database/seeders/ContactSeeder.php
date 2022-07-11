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
            'ref' => ReferenceContactsEnum::PICKUP,
            'name' => 'Giovani Appezzato',
            'email' => 'giovani.appezzato@gmail.com',
            'phone' => '19 99494 7867',
            'type' => 'personal'
        ]);

        Contact::create([
            'ref' => ReferenceContactsEnum::DELIVERY,
            'name' => 'InventDigital',
            'email' => 'inventDigital@gmail.com',
            'phone' => '19 12341 2467',
            'type' => 'business',
            'company' => 'InventDigital',
            'working_from' => '09:00',
            'working_to' => '13:00'
        ]);

        Contact::create([
            'ref' => ReferenceContactsEnum::SHIPPER,
            'name' => 'Juliano Appezzto',
            'email' => 'juliano@gmail.com',
            'phone' => '19 34335 0972',
            'type' => 'personal',
        ]);
    }
}
