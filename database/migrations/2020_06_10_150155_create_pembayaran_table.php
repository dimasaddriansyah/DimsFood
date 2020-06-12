<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pengguna_id');
            $table->foreign('pengguna_id')->references('id')->on('pengguna');
            $table->unsignedBigInteger('pesanan_id');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
            $table->string('nama_pembeli');
            $table->string('bukti_transfer');
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
        Schema::dropIfExists('pembayaran');
    }
}
