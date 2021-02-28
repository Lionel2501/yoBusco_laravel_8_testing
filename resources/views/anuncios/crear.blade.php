@extends('layouts.app')

@section('styles')
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
    integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
    crossorigin="anonymous"/>
@endsection

@section( 'content')

<div class="container">
    <h1 class="text-center mt-4">Crear anuncio</h1>
    <div class="row justify-content-center mt-5">
        <form action="{{route('anuncio.store')}}"
        class="col-xs-12 col-md-9 card card-body"
        method="POST"
        enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categorias">Titulo del anuncio</label>
                <input type="text" name="nombre" id="nombre"
                class="form-control @error ('nombre') is-invalid @enderror"
                value="{{old('nombre')}}">
            </div>
            @error('nombre')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="categorias">Precio</label>
                <input type="text" name="precio" id="precio"
                class="form-control @error ('precio') is-invalid @enderror">
            </div>
            @error('precio')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="categorias">Descripcion</label>
                <input type="hidden" id="descripcion" name="descripcion"
                value="{{old('descripcion')}}">
                <trix-editor
                class="@error ('descripcion') is-invalid border border-red @enderror"
                input="descripcion"></trix-editor>
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
                    {{old('categoria_id') == $categoria->id ? 'selected' : ''}}
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
                    {{old('provincia_id') == $provincia->id ? 'selected' : ''}}
                    value="{{$provincia->id}}">
                        {{$provincia->nombre}}
                    </option>
                    @endforeach
                </select>
                @error('provincia_id')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt">
                <label for="imagen">Imagen</label>
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
                value="Guardar anuncio">
        </form>
    </div>
</div>

@endsection

@extends('ui.footer')

@section('scripts')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"
    integrity="sha512-lyT4F0/BxdpY5Rn1EcTA/4OTTGjvJT9SxWGxC1boH9p8TI6MzNexLxEuIe+K/pYoMMcLZTSICA/d3y0ColgiKg=="
    crossorigin="anonymous">
</script>
@endsection
