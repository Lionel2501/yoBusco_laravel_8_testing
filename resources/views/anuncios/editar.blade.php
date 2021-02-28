@extends('layouts.app')

@extends('ui.nav')

@section('styles')
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
    integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
    crossorigin="anonymous" />
@endsection

@section( 'content')

<div class="container">
    <h1 class="text-center mt-4">Editar {{$anuncio->nombre}}</h1>
    <div class="row justify-content-center mt-5">
        <form action="{{route('anuncio.update', ['anuncio' => $anuncio->id])}}"
        class="col-xs-12 col-md-9 card card-body"
        method="POST"
        enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nombre">Titulo del anuncio</label>
                <input type="text" name="nombre" id="nombre"
                class="form-control @error ('nombre') is-invalid @enderror"
                value="{{$anuncio->nombre}}">
                @error('nombre')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio"
                class="form-control border border-dark
                @error ('precio') is-invalid @enderror"
                value="{{$anuncio->precio}}">
                @error('precio')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="hidden" name="descripcion" id="descripcion"
                value="{{$anuncio->descripcion}}">
                <trix-editor
                    class="@error ('descripcion') is-invalid border border-red @enderror"
                    input="descripcion">
                </trix-editor>
                @error('descripcion')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categorias">Categoria</label>
                <select class="form-control @error ('categoria_id') is-invalid @enderror"
                name="categoria_id" id="categoria">
                <option value="" selected disabled>--Selecione--</option>
                    @foreach($categorias as $categoria)
                    <option
                    {{$anuncio->categoria_id == $categoria->id ? 'selected' : ''}}
                    value="{{$categoria->id}}">
                        {{$categoria->nombre}}
                    </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="provincias">Provincias</label>
                <select class="form-control @error ('provincia_id') is-invalid @enderror"
                name="provincia_id" id="provincia">
                <option value="" selected disabled>--Selecione--</option>
                    @foreach($provincias as $provincia)
                    <option
                    {{$anuncio->provincia_id == $provincia->id ? 'selected' : ''}}
                    value="{{$provincia->id}}">
                        {{$provincia->nombre}}
                    </option>
                    @endforeach
                </select>
                @error('provincia_id')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <label for="imagen">Imagen</label>
            <div class="form-group mt-2">
                <img class="mb-4" src="/storage/{{$anuncio->imagen}}" alt="imagen anuncio" style="width: 250px">
                <input
                    class="form-control @error('imagen') is-invalid @enderror"
                    type="file"
                    id="imagen"
                    name="imagen">
                    @error('imagen')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
            <input type="submit" class="btn btn-primary mt-3 d-block"
                value="Editar anuncio">
        </form>
    </div>
</div>

@endsection

@yield('ui.footer')

@section('scripts')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"
    integrity="sha512-lyT4F0/BxdpY5Rn1EcTA/4OTTGjvJT9SxWGxC1boH9p8TI6MzNexLxEuIe+K/pYoMMcLZTSICA/d3y0ColgiKg=="
    crossorigin="anonymous">
</script>
@endsection
