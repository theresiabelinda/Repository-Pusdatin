<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoriMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'repositorimahasiswa';

    protected $fillable = [
        'id_kategori',
        'judul',
        'abstrak',
        'penulis',
        'tahun',
        'file_cover',
        'file_bab1',
        'file_bab2',
        'file_bab3',
        'file_bab4',
        'file_bab5',
        'file_lampiran',
    ];

    /**
     * Relasi ke tabel kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
