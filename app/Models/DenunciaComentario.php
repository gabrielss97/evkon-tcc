<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaComentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo',
        'status',
        'comentario_id',
        'user_id' // user que está denunciando
    ];

    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
