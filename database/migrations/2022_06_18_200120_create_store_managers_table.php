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
        Schema::create('store_managers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('store_id')->nullable()->constrained('stores');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['supermanager', 'manager'])->default('manager');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number')->unique();
            $table->string('password');

            $table->string('avatar')->nullable();
            $table->integer('active_code')->nullable();
            $table->boolean('is_verified') -> default(0);
            $table->date('verified_at')->nullable();

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
        Schema::dropIfExists('store_managers');
    }
};
