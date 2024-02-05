<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    use HasFactory;

    protected $primaryKey   = 'borrow_id';
    protected $table        = 'borrow';
    protected $fillable   = ([
        'user_id',
        'book_id',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah_pinjam',
        'petugas_pinjam',
        'petugas_kembali',
        'konfirmasi_pinjam',
        'konfirmasi_kembali',
        'status',
    ]);
}
