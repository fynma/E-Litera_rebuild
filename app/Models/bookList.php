<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookList extends Model
{
    use HasFactory;

    protected $table = 'booklistview';

    protected $fillable = ([
        'book_id',
        'judul',
        'gambar',
        'kode_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'total_buku',
        'deskripsi',
        'stok',
        'kategori',
        'rating'
    ]);
}
