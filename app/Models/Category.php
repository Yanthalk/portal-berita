<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; // Nama tabel
    protected $primaryKey = 'category_id'; // Primary key
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'nama_kategori',
    ];

    // Relasi ke berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'category_id', 'category_id');
    }
}
