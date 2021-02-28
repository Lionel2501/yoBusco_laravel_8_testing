@extends('layouts.app')

@extends('ui.nav')

@extends('ui.hero')

@extends('ui.breadcrumb')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        @if(count($anuncios) > 0)
        @foreach($anuncios as $anuncio)
            <div class="col-md-3 border bg-white shadow p-4 m-2">
                <img src="/storage/{{$anuncio->imagen}}" alt="imagen anuncio" width="100%">
            </div>
            <div class="col-md-7 border bg-white shadow p-4 m-2">
                <div class="row">
                    <div class="col-md-6">
                        <p class="uppercase"><strong>{{$anuncio->nombre}}</strong></p>
                        <p>{{$anuncio->precio}} $</p>
                        <p>{{$anuncio->categoria->nombre}}</p>
                        <p>{{$anuncio->provincia->nombre}}</p>
                    </div>
                    <div class="col-md-6">
                        @if($anuncio->created_at === $anuncio->update_at)
                        <p>{{$anuncio->created_at->diffForHumans()}}</p>
                        @else
                        <p>{{$anuncio->updated_at->diffForHumans()}}</p>
                        @endif
                        <p> <a href="{{route('perfil.show', ['perfil' => $anuncio->autor->id])}}"> {{$anuncio->autor->name}}</a></p>
                        <p><a  href="{{route('anuncio.editar', ['anuncio' => $anuncio->id])}}">Editar anuncio</a></p>
                        <p>
                            <eliminar-anuncio
                            anuncio-id="{{$anuncio->id}}"></eliminar-anuncio>
                        </p>
                        <p><a  href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                            class="btn btn-success">Ver anuncio</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="card w-100">
                <div class="card-body rounded">
                    <p class="my-5 text-center">No se encuentra anuncios para la categoria</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('ui.footer')
