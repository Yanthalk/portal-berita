<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita'; // Nama tabel kamu
    protected $primaryKey = 'news_id'; // Primary key kamu

    public $timestamps = false; // Kalau tidak ada created_at dan updated_at

    protected $fillable = [
        'judul',
        'konten',
        'tanggal_publish',
        'status_berita',
        'user_id',
        'category_id',
    ];
}
