<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaAnuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo',
        'status',
        'anuncio_id',
        'user_id' // user que está denunciando
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
