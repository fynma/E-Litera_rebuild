<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';

    protected $primaryKey = 'favorite_id';

    protected $fillable = ([
        'user_id',
        'book_id'
    ]);
}
