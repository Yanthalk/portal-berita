<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRolePowerFromRoleTable extends Migration
{
    public function up()
    {
        Schema::table('role', function (Blueprint $table) {
            $table->dropColumn('role_power');
        });
    }

    public function down()
    {
        Schema::table('role', function (Blueprint $table) {
            $table->string('role_power')->nullable();  // sesuaikan tipe datanya
        });
    }
}
