<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->boolean('operable')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('buyer_number')->nullable();
            $table->foreignId('vehicle_type_id')->constrained('vehicles_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('service_order_id')->constrained('service_orders')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
