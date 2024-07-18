<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pekerja', function (Blueprint $table) {
            $table->id('id_pekerja');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_wisata')->nullable();
            $table->string('nama_pekerja');
            $table->string('alamat_pekerja');
            $table->number('no_hp');
            $table->string('berkas');
            $table->string('foto_pekerja')->nullable();
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pekerja');
    }
};
