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
            $table->string('year');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('color')->nullable();
            $table->string('operable')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('buyer_number')->nullable();
            $table->unsignedBigInteger('service_orders_id')->nullable();
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
