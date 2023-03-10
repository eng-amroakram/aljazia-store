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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('admin_id');
            $table->string('store_id');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('color_id');
            $table->string('size_id');

            $table->string('ar_name');
            $table->string('en_name');
            $table->string('price');
            $table->string('discount');
            $table->string('status');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('attributes');
    }
};
