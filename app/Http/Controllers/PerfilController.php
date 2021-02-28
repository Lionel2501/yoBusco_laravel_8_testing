<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Anuncio;
use App\Models\Provincia;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //anuncio likiado por perfil
        $usuario = auth()->user();

        //traer los anuncios del perfil
        $anuncios = Anuncio::where('user_id', $perfil->user_id)->get();

        return view('perfiles.show',
        compact('perfil', 'anuncios', 'usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //validacion
        $data = request()->validate([
            'nombre' => 'required',
            'provincia_id' => '',
            'ciudad' => '',
            'telefono' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

        //Assignando los valores
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        $perfil->provincia_id = $data['provincia_id'];
        $perfil->ciudad = $data['ciudad'];
        $perfil->telefono = $data['telefono'];
        $perfil->save();

        //si el usuario sube una imagen
        if(request('imagen')){
            $ruta_imagen = $request['imagen']->store('img-perfil', 'public');

            //$ruta_imagen->save();
            $perfil->imagen = $ruta_imagen;
            $perfil->save();
        }

        return redirect()->route('perfil.show', ['perfil' => $perfil->id]);


        //eliminar url y nombre de $data
        //unset($data['url']);
        /*unset($data['nombre']);
        $array_imagen = ['imagen' => $ruta_imagen];

        auth()->user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? []
        ));


        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
