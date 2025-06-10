<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationTable extends Migration
{
    public function up()
    {
        Schema::create('user_notification', function (Blueprint $table) {
            $table->increments('notif_id');
            $table->text('pesan');
            $table->boolean('status_baca');
            $table->dateTime('tanggal_kirim');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_notification');
    }
}
