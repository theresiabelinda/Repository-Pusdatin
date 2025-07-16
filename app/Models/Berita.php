<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id_berita";

    protected $fillable = [
        "no_surat",
        "tanggal_surat",
        "perihal",
        "penerima",
        "file",
        "id_kategori",
        "id_periode" // tambahkan ini agar bisa diisi
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
