<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIklanTable extends Migration
{
    public function up()
    {
        Schema::create('iklan', function (Blueprint $table) {
            $table->increments('iklan_id');
            $table->string('nama_iklan', 100);
            $table->text('isi_iklan');
            $table->binary('gambar_iklan');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_akhir');
            $table->string('status_iklan', 10);
        });
    }

    public function down()
    {
        Schema::dropIfExists('iklan');
    }
}
