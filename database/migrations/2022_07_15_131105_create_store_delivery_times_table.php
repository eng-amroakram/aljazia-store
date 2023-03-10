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
        Schema::create('store_delivery_times', function (Blueprint $table) {
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('delivery_time_id')->constrained('delivery_times')->cascadeOnDelete();

            $table->primary(['store_id', 'delivery_time_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_delivery_times');
    }
};
