<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_blog', function (Blueprint $table) {
            $table->id('id_blog'); // Primary key with auto increment
            $table->unsignedBigInteger('id_wisata')->nullable(); // Foreign key to wisata table
            $table->unsignedBigInteger('id_umkm')->nullable(); // Foreign key to UMKM table
            $table->unsignedBigInteger('id_kuliner')->nullable(); // Foreign key to kuliner table
            $table->string('nama_penulis', 255); // Author name
            $table->string('foto_blog', 255)->nullable(); // Blog photo, optional
            $table->date('tgl_input'); // Date of input

            // Foreign key constraints (assuming you have the respective tables)
            $table->foreign('id_wisata')->references('id')->on('tb_wisata')->onDelete('cascade');
            $table->foreign('id_umkm')->references('id')->on('tb_umkm')->onDelete('cascade');
            $table->foreign('id_kuliner')->references('id')->on('tb_kuliner')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_blog');
    }
};
