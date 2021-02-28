<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provincias')->insert([
            'nombre' => 'CABA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Buenos Aires',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Catamarca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Chaco',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Chubut',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Córdoba',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Corrientes',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Entre Ríos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Formosa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Jujuy',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'La Pampa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'La Rioja',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Mendoza',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Misiones',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Neuquén',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Río Negro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Salta',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'San Juan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'San Luis',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Santa Cruz',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Santa Fe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Santiago del Estero',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Tierra del Fuego',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('provincias')->insert([
            'nombre' => 'Tucumán',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
