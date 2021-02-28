<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nombre' => 'Empleo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Vehiculos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Alquilar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Comprar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Servicios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Ropa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Tecnologia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Eventos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
