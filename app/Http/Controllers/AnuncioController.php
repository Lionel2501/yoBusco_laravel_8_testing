<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Likes;
use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AnuncioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Anuncio $anuncio)
    {
        //obtener el dato si el usuario le dio un like y si esta conectado
        $like = (auth()->user()  ?
        auth()->user()->likeUser->contains($anuncio->id)  :false);

        //pasa la cantidad de likes
        $likes = $anuncio->likeAnuncio->count();

        $anuncios = Anuncio::all();

        //$liked = Anuncio::where('id', $anuncio->autor->id)->get();

        //return dd($liked);
        //traer los anuncios del perfil
        //$populares = Anuncio::where('id', $liked->anuncio_id)->orderBy('DESC');


        return view('anuncios.index',
        compact('anuncios', 'anuncio', 'like', 'likes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //traer los datos
        $categorias = Categoria::all();
        $provincias = Provincia::all();

        return view('anuncios.crear', compact('categorias', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Anuncio $anuncios)
    {
        if(auth()->user() == false){
            return back()->with('estado', 'Tenes que ser registrado para publicar un anuncio');
        }

        // Validacion
        $data = $request->validate([
            'nombre' => 'required',
            'imagen' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'provincia_id' => 'required'
        ]);

        //obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('img-anuncio', 'public');

        //resize image
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(500, 380);
        $img->save();

        //guardar en la bbdd
        auth()->user()->anuncio()->create([
            'nombre' => $data['nombre'],
            'imagen' => $ruta_imagen,
            'precio' => $data['precio'],
            'descripcion' => $data['descripcion'],
            'categoria_id' => $data['categoria_id'],
            'provincia_id' => $data['provincia_id'],
        ]);

        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        //obtener el dato si el usuario le dio un like y si esta conectado
        $like = (auth()->user()  ?
        auth()->user()->likeUser->contains($anuncio->id)  :false);

        //pasa la cantidad de likes
        $likes = $anuncio->likeAnuncio->count();

        $anuncios = Anuncio::all();
        $provincias = Provincia::all();

        return view('anuncios.show',
        compact('anuncios', 'provincias', 'anuncio', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        if(auth()->user() == false){
            return back()->with('estado', 'Tenes que ser registrado para poder editar un anuncio');
        }

        //traer los datos
        $categorias = Categoria::all();
        $provincias = Provincia::all();

        return view('anuncios.editar', compact('anuncio', 'categorias', 'provincias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        //revisa el policy
        $this->authorize('update', $anuncio);

        // Validacion
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'provincia_id' => 'required',
            'updated_at' => Carbon::now()
        ]);

        //asignando los valores
        $anuncio->nombre = $data['nombre'];
        $anuncio->precio = $data['precio'];
        $anuncio->descripcion = $data['descripcion'];
        $anuncio->categoria_id = $data['categoria_id'];
        $anuncio->provincia_id = $data['provincia_id'];
        $anuncio->user_id = Auth::user()->id;
        $anuncio->updated_at = Carbon::now();

        //si el usuario sube una imagen
        if(request('imagen')){
            $ruta_imagen = $request['imagen']->store('img-anuncio', 'public');

            //resize image
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(500, 380);
            $img->save();
            //$ruta_imagen->save();
            $anuncio->imagen = $ruta_imagen;
        }

        $anuncio->save();

        return redirect()->route('anuncio.show', ['anuncio' => $anuncio->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        //
        $anuncio->delete();

        return redirect()->route('home');
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $categoria = $request->get('categoria_id');
        $provincia = $request->get('provincia_id');

        $anuncios = Anuncio::where('nombre', 'like', '%' . $busqueda . '%')
            ->where('categoria_id', '=', $categoria)
            ->where('provincia_id', '=', $provincia)
            ->get();
            //$anuncios->appends(['buscar' => $busqueda]);

        return view('buscar.show', compact('anuncios', 'busqueda'));
    }
}
