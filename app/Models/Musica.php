<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'letra', 'ano', 'album', 'premios', 
    ];
    protected static function booted(){
        static::deleting(function (Musica $musica){
            Log::channel('stderr')->info('Música deletada'. $musica->image->path);
            Storage::disk('public')->delete($musica->image->path);    
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }
}
