<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pieces extends Model
{
    use HasFactory;
    public $fillable = [
        'titre',
        'artiste',
        'genre',
        'album',
        'image',
        'audio',
        'ban',
        'user_id',
    ];
    public function commenter()
    {
        return $this->hasMany(commenter::class, 'song_id', 'id');
    }
}
