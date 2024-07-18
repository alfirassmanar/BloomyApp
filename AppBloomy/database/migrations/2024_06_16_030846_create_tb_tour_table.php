<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_tour', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tour');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->integer('lama_tour');
            $table->integer('id_wisata')();
            $table->string('fasilitas_penginapan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_tour');
    }
};
