@extends('layouts.app')

@section('styles')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
crossorigin="anonymous" />
@endsection

@extends('ui.nav')

@extends('ui.hero')


@section( 'content')
<div class="container justify-content-center">
    <div class="row">
        <nav class="col-md-11 p-0" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('inicio')}}">Inicio</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
              </li>
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
    </div>
</div>
<div class="container justify-content-center">
    <h2>Anuncios mas populares</h2>
    <div class="row">
        <div class="owl-carousel owl-theme col-md-12">
            @foreach($anuncios as $anuncio)
            <div class="card rounded">
                <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}">
                    <img src="/storage/{{$anuncio->imagen}}" alt="imagen anuncio"
                    class="border bg-white shadow" width="350px">
                </a>
                <p class="p-2 mb-0">
                    <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                        class="text-decoration-none text-dark">
                    {{$anuncio->nombre}}</a>
                </p>
                <p class="font-weight-bold p-2 mb-0">{{$anuncio->precio}} $</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container ">
    <div class="row justify-content-center mt-3">

        @foreach($anuncios as $anuncio)
            <img class="card col-md-3 m-2 px-0 border bg-white shadow" src="/storage/{{$anuncio->imagen}}" alt="imagen anuncio"
            class="">
            <div class="col-md-7 border bg-white shadow p-4 m-2">
                <div class="row">
                    <div class="col-md-8">
                        <p class="uppercase fs-3">
                            <a href="{{route('anuncio.show', ['anuncio' => $anuncio->id])}}"
                            style="color: #e69327">
                                {{$anuncio->nombre}}
                            </a>
                        </p>
                        <p class="font-weight-bold">{{$anuncio->precio}} $</p>
                        <p>{{$anuncio->categoria->nombre}}</p>
                        <p>{{$anuncio->provincia->nombre}}</p>

                    </div>
                    <div class="col-md-4">
                        @if(auth()->user() == true)
                        <like-button
                        anuncio-id="{{$anuncio->id}}"
                        like="{{$like}}"
                        likes="{{$likes}}"
                        ></like-button>
                        @endif
                        <div class="fecha-index">
                            <p>
                                <small class="">
                                    @if($anuncio->created_at === $anuncio->update_at)
                                    <p><small>{{$anuncio->created_at->diffForHumans()}}</small></p>
                                    @else
                                    {{$anuncio->updated_at->diffForHumans()}}
                                    @endif
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('ui.footer')
