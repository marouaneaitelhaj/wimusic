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
    public function pieces()
    {
        return $this->belongsTo(pieces::class, 'song_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
