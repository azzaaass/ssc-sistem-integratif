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
        Schema::create('pics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_admin')->references('id')->on('admins');
            $table->string('deskripsi');
            $table->foreignId('id_ruangan')->nullable(); // jika null berarti bukan tingkat 1
            $table->string('tingkat');
            $table->foreignId('id_next_pic');
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
        Schema::dropIfExists('pics');
    }
};
