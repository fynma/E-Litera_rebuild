<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $primaryKey = 'notification_id';
    
    protected $fillable = ([
        'user_id',
        'to_user',
        'title',
        'message',
        'created_at',
        'updated_at',
    ]);
}
