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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('carrier_pay');
            $table->json('internal_notes')->nullable();
            /**
             * Enum: PaymentTypesEnum.php
             */
            $table->string('type')->nullable();
            /**
             * Enum: PaymentMethodsEnum.php
             */
            $table->string('method')->nullable();

            $table->foreignId('service_order_id')
                ->constrained('service_orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
        Schema::dropIfExists('payments');
    }
};
