<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Role
};

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id'   => 1,
            'name' => RolesEnum::ADMIN
        ]);

        Role::create([
            'id'   => 2,
            'name' => RolesEnum::DRIVER
        ]);

        Role::create([
            'id'   => 3,
            'name' => RolesEnum::SUPERVISOR
        ]);

        Role::create([
            'id'   => 4,
            'name' => RolesEnum::DISPATCHER
        ]);
    }
}
