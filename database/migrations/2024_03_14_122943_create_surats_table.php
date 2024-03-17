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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_admin')->nullable();
            $table->string('estimasi');
            $table->string('type');
            $table->string('input1')->nullable();
            $table->string('input2')->nullable();
            $table->string('input3')->nullable();
            $table->string('input4')->nullable();
            $table->string('input5')->nullable();
            $table->string('input6')->nullable();
            $table->string('input7')->nullable();
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
