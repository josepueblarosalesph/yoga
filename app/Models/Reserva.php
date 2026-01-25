<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function horas()
    {
        return $this->hasMany(Hora::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
