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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_manager_id')->nullable()->constrained('store_managers')->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->cascadeOnDelete();
            $table->enum('category_type', ['sell', 'borrow'])->default('sell');
            $table->string('ar_name')->unique();
            $table->string('en_name')->unique();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('ranking');
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
        Schema::dropIfExists('categories');
    }
};
