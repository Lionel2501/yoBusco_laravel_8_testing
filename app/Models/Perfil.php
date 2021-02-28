<?php

namespace App\Models;

use App\Models\Provincia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfil extends Model
{
    use HasFactory;

    //relacion de 1 a 1, de perfil con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion 1 a 1 categoria y perfil
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
