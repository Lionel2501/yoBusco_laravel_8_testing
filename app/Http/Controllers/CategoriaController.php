<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria)
    {
        $anuncios = Anuncio::where('categoria_id', $categoria->id)->get();
        //return $anuncios = Anuncio::where('categoria_id', $categoria->id);

        return view('categorias.show', compact('anuncios'));
    }
}
