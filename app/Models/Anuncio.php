<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Provincia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'precio',
        'descripcion',
        'categoria_id',
        'provincia_id',
    ];

    //relacion 1 a 1 categoria y anuncio
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //relacion 1 a 1 categoria y anuncio
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    //obtener la informacion del usuario via FK (un autor puede tener varios anuncios)
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //like recibo por un anuncio
    public function likeAnuncio()
    {
        return $this->belongsToMany(User::class, 'likes_anuncio');
    }
}
