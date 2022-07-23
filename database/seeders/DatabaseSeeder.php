<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            /**
             * Tabelas relacionada as ordens de serviço
             */
            ServiceOrderSeeder::class,
            VehicleTypeSeeder::class,
            VehicleSeeder::class,
            PaymentSeeder::class,
            ContactSeeder::class,
            PickupSeeder::class,
            DeliverySeeder::class,
            ShipperSeeder::class
        ]);
    }
}
