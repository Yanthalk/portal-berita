<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita'; // Nama tabel
    protected $primaryKey = 'news_id'; // Primary key

    public $timestamps = true; // Karena kamu sudah menambahkan timestamps di migrasi

    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'isi',
        'gambar',
        'penulis',
        'negara',
        'tanggal_publish',
        'user_id',
        'category_id',
    ];

    // Relasi ke user (jika model User ada)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
