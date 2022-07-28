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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            /**
             * Enum: ReferenceContactsEnum.php
             */
            $table->string('ref');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('type', ['personal', 'business']);
            /**
             * Type business.
             */
            $table->string('company')->nullable();
            $table->string('working_from')->nullable();
            $table->string('working_to')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
