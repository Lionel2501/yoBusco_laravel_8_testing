<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function show(Provincia $provincia)
    {
        $anuncios = Anuncio::where('provincia_id', $provincia->id)->get();
        //return $anuncios = Anuncio::where('categoria_id', $categoria->id);

        return view('provincias.show', compact('anuncios'));
    }
}
