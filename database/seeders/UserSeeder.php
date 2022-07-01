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
        $user = User::create([
            "name"         => "Admin",
            "email"        => "admin@admin.com",
            "password"     => Hash::make('12345678'),
        ]);

        RoleUser::create([
            'role_id' => 1,
            'user_id' => $user->id,
        ]);
    }
}
