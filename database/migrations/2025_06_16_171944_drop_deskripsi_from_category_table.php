<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDeskripsiFromCategoryTable extends Migration
{
    public function up(): void
    {
        Schema::table('category', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('category', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(); // default nullable untuk rollback aman
        });
    }
}
