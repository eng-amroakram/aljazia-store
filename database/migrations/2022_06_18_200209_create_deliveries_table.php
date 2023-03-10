<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins');
            $table->enum('status', ['active', 'inactive'])->default('active');
            // $table->enum('role', ['delivery', 'superdelivery'])->default('delivery');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('user_id')->unique();
            // $table->string('username')->unique()->nullable();


            $table->string('avatar')->nullable();
            $table->integer('active_code')->nullable();
            $table->boolean('is_verified') -> default(0);
            $table->date('verified_at')->nullable();

            $table->string('phone_number')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('deliveries');
    }
};
