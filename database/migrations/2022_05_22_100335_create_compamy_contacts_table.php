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
        Schema::create('compamy_contacts', function (Blueprint $table) {
            $table->id();
            $table->text('overview_title_en')->nullable();
            $table->text('overview_title_ar')->nullable();
            $table->text('overview_text_en')->nullable();
            $table->text('overview_text_ar')->nullable();
            $table->text('who_abgd_text_en')->nullable();
            $table->text('who_abgd_text_ar')->nullable();
            $table->text('why_us_text_en')->nullable();
            $table->text('why_us_text_ar')->nullable();
            $table->text('join_us_text_en')->nullable();
            $table->text('join_us_text_ar')->nullable();
            $table->text('how_register_text_en')->nullable();
            $table->text('how_register_text_ar')->nullable();
            $table->text('contact_us_text_en')->nullable();
            $table->text('contact_us_text_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('phones')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('compamy_contacts');
    }
};
