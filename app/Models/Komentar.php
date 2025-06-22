<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'comment'; // karena bukan 'komentars' (default Laravel)
    protected $primaryKey = 'comment_id';
    public $timestamps = false; // karena tidak ada created_at & updated_at di tabel

    protected $fillable = [
        'komentar',
        'tanggal_komentar',
        'user_id',
        'news_id'
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relasi ke berita
    public function berita()
    {
        return $this->belongsTo(Berita::class, 'news_id', 'news_id');
    }
}
