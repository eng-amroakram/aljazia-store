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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            #Relationships
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('delivery_id')->nullable()->constrained('deliveries')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('delivery_time_id')->constrained('delivery_times')->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->enum('status', ['new','pending','in_progress', 'rejected', 'delivered', 'complete'])->default('pending');
            $table->enum('payment_method', ['cash', 'mada'])->default('cash');
            $table->enum('not_found_option', ['contact with me', 'remove product', 'replace product'])->nullable();
            $table->enum('cancellation_party', ['user', 'admin', 'store_manager'])->default('user');
            $table->json('products');
            $table->float('total_price');
            $table->float('total_products');

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
        Schema::dropIfExists('orders');
    }
};
