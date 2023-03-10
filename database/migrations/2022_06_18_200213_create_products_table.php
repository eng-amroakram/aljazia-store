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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('store_manager_id')->nullable()->constrained('store_managers')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('ar_name')->unique()->nullable();
            $table->string('en_name')->unique()->nullable();
            $table->integer('ranking')->nullable();
            $table->float('offer_price')->nullable();
            $table->integer('is_offer')->nullable();
            $table->float('order_max')->nullable();
            $table->text('ar_description')->nullable();
            $table->text('en_description')->nullable();
            $table->float('price',0.0)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('products');
    }
};
