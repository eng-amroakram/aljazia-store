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
        Schema::create('store_managers_roles', function (Blueprint $table) {
            $table->foreignId('store_manager_id')->constrained('store_managers')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();

            $table->primary(['store_manager_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_managers_roles');
    }
};
