@extends('layouts.app')

@extends('ui.nav')

@extends('ui.hero')

@section('content')
 <div class="container">
     <h2 class="titulo-categoria text-uppercase">Resultados búsqueda: {{$busqueda}}</h2>
     <div class="row">
        @foreach($anuncios as $anuncio)
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <img src="{{ Storage::url($anuncio->imagen ) }}" alt="image-receta" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">{{$anuncio->nombre}}</h3>
                    <div class="card-text">
                        <p>{{Str::words( strip_tags($anuncio->descripcion), 20 )}}</p>
                        <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                            class="btn btn-outline-success text-uppercase d-block font-weight-bold">Ver anuncio
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
     </div>
 </div>
@endsection

@extends('ui.footer')
