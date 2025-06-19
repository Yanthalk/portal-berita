<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBeritaTable extends Migration
{
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            // Hapus kolom status_berita
            $table->dropColumn('status_berita');

            // Tambahkan kolom baru
            $table->longText('isi')->nullable()->after('konten');
            $table->string('gambar')->nullable()->after('isi');
            $table->string('penulis')->nullable()->after('gambar');
        });
    }

    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            // Tambahkan kembali kolom yang dihapus
            $table->string('status_berita', 10)->after('tanggal_publish');

            // Hapus kolom yang ditambahkan
            $table->dropColumn(['isi', 'gambar', 'penulis']);
        });
    }
}
