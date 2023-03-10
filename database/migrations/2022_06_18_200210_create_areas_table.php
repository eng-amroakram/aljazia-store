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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            #Relations
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->foreignId('delivery_id')->nullable()->constrained('deliveries')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->cascadeOnDelete();
            #Fields
            $table->string('ar_name');
            $table->string('en_name');
            $table->float('delivery_price', 0.0);
            $table->longText('bounds')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            // $table->string('city')->nullable();
            // $table->string('state')->nullable();
            // $table->string('country')->nullable();
            // $table->string('pincode')->nullable();
            // $table->float('latitude', 0.0)->nullable();
            // $table->float('longitude', 0.0)->nullable();

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
        Schema::dropIfExists('areas');
    }
};
