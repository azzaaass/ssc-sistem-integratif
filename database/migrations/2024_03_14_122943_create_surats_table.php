<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_pic')->nullable();
            $table->string('estimasi');
            $table->boolean('status');
            $table->string('type');
            $table->string('input1')->nullable();
            $table->string('input2')->nullable();
            $table->string('input3')->nullable();
            $table->string('input4')->nullable();
            $table->string('input5')->nullable();
            $table->string('input6')->nullable();
            $table->string('input7')->nullable();
            $table->string('input8')->nullable();
            $table->string('input9')->nullable();
            $table->string('input10')->nullable();
            // revisi
            $table->string('status_revisi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('input1_revisi')->nullable();
            $table->string('input2_revisi')->nullable();
            $table->string('input3_revisi')->nullable();
            $table->string('input4_revisi')->nullable();
            $table->string('input5_revisi')->nullable();
            $table->string('input6_revisi')->nullable();
            $table->string('input7_revisi')->nullable();
            $table->string('input8_revisi')->nullable();
            $table->string('input9_revisi')->nullable();
            $table->string('input10_revisi')->nullable();
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
        Schema::dropIfExists('surats');
    }
};
