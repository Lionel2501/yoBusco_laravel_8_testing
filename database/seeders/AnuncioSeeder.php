<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anuncios')->insert([
            'nombre' => 'Peugeot 208',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '1',
            'provincia_id' => '2',
            'ciudad' => 'Tandil',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Piano',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '1',
            'provincia_id' => '1',
            'ciudad' => 'Tandil',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Lavaropa',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '5',
            'provincia_id' => '2',
            'ciudad' => 'Tandil',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Computadora',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '5',
            'provincia_id' => '5',
            'ciudad' => 'Salta',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Mate',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '3',
            'provincia_id' => '5',
            'ciudad' => 'Salta',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Bici',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '3',
            'provincia_id' => '5',
            'ciudad' => 'Salta',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Peugeot 208',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '1',
            'provincia_id' => '2',
            'ciudad' => 'Cordoba',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Piano',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '1',
            'provincia_id' => '1',
            'ciudad' => 'Cordoba',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Lavaropa',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '5',
            'provincia_id' => '2',
            'ciudad' => 'Cordoba',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Computadora',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '5',
            'provincia_id' => '5',
            'ciudad' => 'Cordoba',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Mate',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '3',
            'provincia_id' => '5',
            'ciudad' => 'Santa Fe',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('anuncios')->insert([
            'nombre' => 'Bici',
            'imagen' => 'img-anuncio/PuDsbL7EYvEu0zbUfFdgANLrUVxyqqMFhkFMOxZ6.jpg',
            'categoria_id' => '3',
            'provincia_id' => '5',
            'ciudad' => 'Santa Fe',
            'precio' => '3000',
            'descripcion' => 'muy buen estado',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
