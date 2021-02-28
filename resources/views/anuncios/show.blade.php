@extends('layouts.app')

@section('styles')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
crossorigin="anonymous" />
@endsection

@extends('ui.nav')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <nav class="col-md-11 p-0" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              @foreach ($categorias as $categoria)
                @if(isset($anuncio) && $anuncio->categoria_id == $categoria->id)
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('categoria.show', ['categoria' => $categoria->id])}}">
                        {{$categoria->nombre}}
                    </a>
                    </li>
                @endisset
              @endforeach
              @foreach ($provincias as $provincia)
                @if(isset($anuncio) && $anuncio->provincia_id == $provincia->id)
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('provincia.show', ['provincia' => $provincia->id])}}">
                        {{$provincia->nombre}}
                    </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{$anuncio->ciudad}}
                        </li>
                    <li class="breadcrumb-item" aria-current="page">
                    {{$anuncio->nombre}}
                    </li>
                @endisset
              @endforeach
            </ol>
        </nav>
        <article class="col-md-8 contenido-receta bg-white p-2">
            <div class="row border-anuncio rounded mx-4 p-2 mb-4">
                <img src="/storage/{{$anuncio->imagen}}" alt="imagen anuncio"
                class="w-80 border bg-white shadow">

            </div>
            <div class="row border-anuncio rounded mx-4 p-2 mb-4 shadow">
                <div class="col-md-7">
                    <h3 class="font-weight-bold"> {{$anuncio->nombre}} </h3>
                    <h5 class="font-weight-bold mt-4">
                        {{$anuncio->precio}} $
                    </h5>
                    <p><small>publicado</small>
                        @if($anuncio->created_at === $anuncio->update_at)
                        <small>{{$anuncio->created_at->diffForHumans()}}</small>
                        @else
                        <small>{{$anuncio->updated_at->diffForHumans()}}</small>
                        @endif
                    </p>
                </div>
                @if(isset(auth()->user()->id) && auth()->user()->id == $anuncio->user_id)
                <div class="col-md-4 ">
                    <like-button
                        anuncio-id="{{$anuncio->id}}"
                        like="{{$like}}"
                        likes="{{$likes}}"
                    ></like-button>
                </div>
                @endif
            </div>
            <h2 class="p-2 ml-3">Criterios</h2>
            <div class="border-anuncio rounded mx-4 p-3 mb-4 shadow">
                <p>
                    <span class="font-weight-bold">Categoria: </span>
                    {{$anuncio->categoria->nombre}}
                </p>
                <p>
                    <span class="font-weight-bold">Provincia: </span>
                    {{$anuncio->provincia->nombre}}
                </p>
                <p>
                    <span class="font-weight-bold">Descripcion: </span>
                    {!!$anuncio->descripcion!!}
                </p>
            </div>
            @if(isset(auth()->user()->id) && auth()->user()->id == $anuncio->user_id)
            <h2 class="p-2 ml-3">Administrar</h2>
            <div class="border-anuncio rounded mx-4 p-3 mb-4 shadow">
                <p><a  href="{{route('anuncio.editar', ['anuncio' => $anuncio->id])}}">Editar anuncio</a></p>
                <p>
                    <eliminar-anuncio
                    anuncio-id="{{$anuncio->id}}"></eliminar-anuncio>
                </p>
            </div>
            @endif
        </article>

        <div class="card col-md-4" style="background-color: #f8fafc; border:none;">
            <div class="card bg-white shadow-sm" style="width: 20rem;">
                @if($anuncio->autor->perfil->imagen == true)
                <img src="{{ Storage::url($anuncio->autor->perfil->imagen) }}"
                class="card-img-top mx-auto rounded-2" alt="Card image cap">
                @else
                <img src="{{url('/images/avatar.png')}}" class="text-center w-100 p-1" alt="imagen-logo">
                @endif
                <div class="card-body">
                    <p class="card-title">Autor: <a class="text-dark"
                        href="{{ route('perfil.show', ['perfil' => $anuncio->autor->id ])}}">{{$anuncio->autor->name}}</a>
                    </p>
                    <p>Anuncios: {{$anuncio->autor->count()}}</p>
                    <p>Miembro desde: {{$anuncio->autor->created_at->diffForHumans()}}</p>
                    @if($anuncio->autor->perfil->imagen)
                    <p>Telefono: {{$anuncio->autor->perfil->telefono}}</p>
                    @endif
                    <a href="{{ route('perfil.show', ['perfil' => $anuncio->autor->id ])}}"
                        class="btn btn-primary mt-3 float-right align-self-end">Ver Perfil
                    </a>
                </div>
              </div>

        </div>
    </div>
</div>
@endsection

@extends('ui.footer')
