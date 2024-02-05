<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denda extends Model
{
    use HasFactory;

    protected $primaryKey = 'denda_id';
    protected $table = 'denda';
    protected $fillable = ([
        'denda_id',
        'keterlambatan',
        'tarif_denda',
    ]);
}
