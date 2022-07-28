<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\{
    User,
    RoleUser
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Admin account
         */
        $user = User::create([
            "name"         => "Admin",
            "email"        => "admin@admin.com",
            "phone"        => "(555) 145-8574",
            "password"     => Hash::make('rodopenhadgi'),
        ]);

        RoleUser::create([
            'role_id' => 1,
            'user_id' => $user->id,
        ]);

        /**
         * Driver account
         */
        $user = User::create([
            "name"         => "Driver",
            "email"        => "driver@driver.com",
            "phone"        => "(555) 145-8574",
            "password"     => Hash::make('rodopenhadgi'),
        ]);

        RoleUser::create([
            'role_id' => 2,
            'user_id' => $user->id,
        ]);
    }
}
