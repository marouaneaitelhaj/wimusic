<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commenter extends Model
{
    use HasFactory;
    protected $table = 'commenter';
    protected $fillable = [
        'user_id',
        'song_id',
        'comment',
    ];
}
