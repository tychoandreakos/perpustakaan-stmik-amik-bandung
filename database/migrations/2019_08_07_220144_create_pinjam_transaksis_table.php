<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bibliobigrafi_id');
            $table->date('tgl_pinjam');
            $table->timestamp('tanggal_habis_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->boolean('status_pinjam')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bibliobigrafi_id')->references('id')->on('bibliobigrafi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam_transaksi');
    }
}