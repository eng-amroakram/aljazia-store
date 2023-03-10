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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            // $table->string('username')->unique();
            $table->string('phone_number')->unique();
            $table->string('avatar')->nullable();
            $table->integer('active_code')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->date('verified_at')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['superadmin', 'admin'])->default('admin');
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
        Schema::dropIfExists('admins');
    }
};
