<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->string('invoice');
            $table->timestamp('tgl_pesanan');
            $table->double('total_pesanan');
            $table->foreign('id_barang')->references('id')->on('data_barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pesanans');
    }
}
