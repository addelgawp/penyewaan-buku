<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'kode',
        'judul',
        'kategori_id',
        'penerbit_id',
        'isbn',
        'pengarang',
        'jumlah_halaman',
        'stok',
        'tahun_terbit',
        'sinopis',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
