<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\ServiceOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceOrder::create([
            'load_id' => '#76296',
            'trailer_type' => 'open',
            'inspection_type' => 'standard',
            'status' => StatusEnum::DELIVERED
        ]);
    }
}
