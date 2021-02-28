<?php

namespace App\Models;

use App\Models\Perfil;
use App\Models\Anuncio;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //ejecuta un evento cuando un usuario esta creado
    protected static function boot()
    {
        parent::boot();

        //assignar perfil cuando un usuario se creo
        static::created(function ($user){
            $user->perfil()->create();
        });
    }

    public function anuncio()
    {
        return $this->hasOne(Anuncio::class);
    }

    //Relacion de 1 a 1, de usuario con perfil
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    //receta que el usuario le dio al anuncio
    public function likeUser()
    {
        return $this->belongsToMany(Anuncio::class, 'likes_anuncio');
    }
}
