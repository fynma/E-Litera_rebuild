<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected $table = "book";
    protected $primaryKey = "book_id";

    protected $fillable = ([
        'gambar',
        'judul',
        'kode_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'total_buku',
        'deskripsi',
    ]);
}
