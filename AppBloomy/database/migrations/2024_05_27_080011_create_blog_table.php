<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_blog', function (Blueprint $table) {
            $table->id('id_blog');
            // $table->string('nama_umkm');
            // $table->string('kategori');
            // $table->text('keterangan');
            // $table->string('foto_usaha')->nullable();
            // $table->date('tgl_berdiri');
            // $table->date('tgl_input');
            // $table->string('lokasi');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
