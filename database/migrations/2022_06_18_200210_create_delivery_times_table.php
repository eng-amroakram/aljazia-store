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
        Schema::create('delivery_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->foreignId('delivery_id')->nullable()->constrained('deliveries')->cascadeOnDelete();
            // $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->cascadeOnDelete();
            $table->foreignId('store_manager_id')->nullable()->constrained('store_managers')->cascadeOnDelete();
            $table->json('days');
            $table->string('start_time');
            $table->string('end_time');
            $table->float('price', 0.0);
            $table->integer('capacity')->default(0);
            $table->integer('consume')->default(0);
            $table->json('status');
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
        Schema::dropIfExists('delivery_times');
    }
};
