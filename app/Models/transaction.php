<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';

    protected $fillable = ([
        'username',
        'user_id',
        'denda_id',
        'total_denda',
    ]);
}
