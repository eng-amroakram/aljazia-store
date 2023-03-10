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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('email');
            // $table->string('username')->nullable()->unique();
            $table->string('phone_number')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['delivery', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('avatar')->nullable();
            $table->integer('active_code')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->date('verified_at')->nullable();

            $table->string('fcm_token')->nullable();
            $table->string('device_id')->nullable();
            $table->string('device_type')->nullable();
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
        Schema::dropIfExists('users');
    }
};
