<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\{
    VehicleType
};

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles_types')->insert([
            ['id' => 1, 'name' => 'Sedan'],
            ['id' => 2, 'name' => 'Mini-van'],
            ['id' => 3, 'name' => 'Motorcycle'],
            ['id' => 4, 'name' => 'SUV'],
        ]);
    }
}
