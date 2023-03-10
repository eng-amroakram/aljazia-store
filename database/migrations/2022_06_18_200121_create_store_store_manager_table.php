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
        Schema::create('store_store_manager', function (Blueprint $table) {
            $table->foreignId('store_id')->constrained('stores');
            $table->foreignId('store_manager_id')->constrained('store_managers');

            $table->primary(['store_id', 'store_manager_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_store_manager');
    }
};
