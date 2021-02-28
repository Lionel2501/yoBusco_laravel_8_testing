@extends('layouts.app')

@extends('ui.nav')

@section('content')

<div class="container mt-5 bg-white">
    <div class="row border border-secondary rounded mb-5 shadow">
        <div class="col-md-5 my-2">
            @if($perfil->imagen)
            <img src="{{ Storage::url($perfil->imagen) }}" class="rounded-circle" alt="imagen-chef" width="300px">
            @else
            <img src="{{url('/images/avatar.png')}}"
            class="w-50 mb-2" alt="imagen-logo" >
            @endif
        </div>
        <div class="col-md-7 mt-2 px-4 pt-5">
            @if(auth()->user()->id == $perfil->id)
            <p class="d-inline float-right"><a href="{{ route('perfil.editar', ['perfil' => $perfil->id ]) }}">Ediatr perfil</a></p>
            @endif
            <p>Nombre: {{$perfil->usuario->name}}</p>
            <p>Provincia:
                @if($perfil->provincia_id)
                {{ $perfil->provincia->nombre}}
                @endif
            </p>
            <p>Ciudad: {{ $perfil->ciudad}}</p>
            <p class="d-inline">Telefono: {{ $perfil->telefono}}</p>
            <p class="d-inline float-right">Miembro desde {{$perfil->created_at->diffForHumans()}}</p>
        </div>
    </div>
</div>

<div class="container bg-white border border-secondary mb-5 shadow">
    <h2 class="text-center my-5">Anuncios publicado por {{ $perfil->usuario->name }}</h2>
    <div class="row mx-auto bg-white">
        @if(count($anuncios) > 0)
            @foreach($anuncios as $anuncio)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($anuncio->imagen) }}"
                        class="card-image-top" alt="imagen-receta" width="100%" height="250px">
                        <div class="card-body">
                            <h3>{{ $anuncio->nombre }}</h3>
                            <h4>{{$anuncio->precio}} $</h4>
                            <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                                class="btn btn-outline-success d-block mt-4 font-weight-bold text-uppercase">
                                Ver anuncio
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <p class="text-center w-100">No hay anuncios aun..</p>
        @endif
    </div>
</div>
<div class="container bg-white border border-secondary mb-5 shadow">
    <h2 class="my-5 text-center">Anuncios preferidos</h2>
    <div class="row mx-auto bg-white">
            @if(count($usuario->likeUser) > 0)
            @foreach($usuario->likeUser as $anuncio)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ Storage::url($anuncio->imagen) }}"
                    class="card-image-top" alt="imagen-receta" width="100%" height="250px">
                    <div class="card-body">
                        <h3>{{$anuncio->nombre}}</h3>
                        <h4>{{$anuncio->precio}} $</h4>
                        <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                            class="btn btn-outline-success d-block mt-4 font-weight-bold text-uppercase">
                            Ver anuncio
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @elseif(auth()->user()->id == $perfil->id)
        <p class="text-center w-100">Nos tenes anuncios preferido</p>
    @else
        <p class="text-center w-100">{{$perfil->usuario->name}} no tiene anuncios preferido</p>
    @endif
    </div>

@endsection

@extends('ui.footer')
