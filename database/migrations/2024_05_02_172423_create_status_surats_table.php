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
        Schema::create('status_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_surat')->references('id')->on('surats')->onDelete('cascade');
            $table->foreignId('id_admin');
            $table->string('status');
            $table->string('message')->nullable();
            $table->string('pic_name')->nullable();
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
        Schema::dropIfExists('status_surats');
    }
};
