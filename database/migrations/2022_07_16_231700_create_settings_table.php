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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('email_manager');
            $table->string('mobile');
            $table->string('telephone');
            $table->string('vat');
            $table->string('vat_no');
            $table->string('ios_link');
            $table->string('android_link');
            $table->string('website_link');
            $table->longText('ar_decription');
            $table->longText('en_decription');
            $table->text('ar_address');
            $table->text('en_address');
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
        Schema::dropIfExists('settings');
    }
};
