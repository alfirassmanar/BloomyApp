<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_kuliner', function (Blueprint $table) {
            $table->id('id_kuliner');
            $table->string('nama_kuliner');
            $table->string('kategori');
            $table->text('keterangan');
            $table->string('foto_usaha')->nullable();
            $table->date('tgl_berdiri');
            $table->date('tgl_input');
            $table->string('lokasi');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('kuliner');
    }
};
