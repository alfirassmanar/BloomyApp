<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('id_user');
            $table->string('id_tour');
            $table->string('no_tiket');
            $table->date('tgl_pesan');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
