<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 10);
            $table->string('nama_produk', 50);
            $table->unsignedBigInteger('kategori_id');
            $table->string('deskripsi', 150);
            $table->string('gambar', 150)->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
