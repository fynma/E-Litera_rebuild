<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_category extends Model
{
    use HasFactory;
    protected $table = 'book_category';
    protected $primaryKey = 'relation_id';

    protected $fillable = ([
        'book_id',
        'category_id'
    ]);
}
