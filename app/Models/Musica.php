<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'letra', 'ano', 'album', 'premios', 
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
