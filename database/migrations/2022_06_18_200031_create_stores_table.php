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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('en_name')->unique();
            $table->string('ar_name')->unique();
            $table->string('phone_number')->unique();
            $table->string('email');
            $table->string('min_order');
            $table->string('tax_number')->nullable();
            $table->string('vat_number')->nullable();

            $table->integer('active_code')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->date('verified_at')->nullable();

            $table->json('days_of_work')->nullable();
            // $table->string('password');
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
        Schema::dropIfExists('stores');
    }
};
