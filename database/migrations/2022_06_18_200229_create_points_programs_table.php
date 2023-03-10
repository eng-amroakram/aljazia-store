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
        Schema::create('points_programs', function (Blueprint $table) {
            $table->id();
            $table->integer('purchase_value');
            $table->integer('points_earned');
            $table->integer('minimum_number_of_points_to_transfer');
            $table->integer('transfer_fee');
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
        Schema::dropIfExists('points_programs');
    }
};
