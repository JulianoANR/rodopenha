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
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('color');
            $table->boolean('operable');
            $table->string('lot_number');
            $table->string('buyer_number');
            $table->foreignId('vehicle_type_id')->constrained('vehicles_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('service_order_id')->constrained('service_orders')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
