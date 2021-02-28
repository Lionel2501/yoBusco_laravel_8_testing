@extends('layouts.app')

@section('styles')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
crossorigin="anonymous"/>
@endsection

@extends('ui.nav')

@section('content')
<div class="container mt-3">
        <h1 class="text-center">Editar mi perfil</h1>
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-3 mt-5 border border-secondary">
                <form action="{{ route('perfil.update', ['perfil' => $perfil->id]) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Tu nombre"
                        value="{{ $perfil->usuario->name }}">
                        @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="provincias">Provincias</label>
                        <select class="form-control @error ('provincia_id') is-invalid @enderror"
                        name="provincia_id" id="provincia">
                        <option value="" selected disabled>--Selecione--</option>
                            @foreach($provincias as $provincia)
                            <option
                            {{$perfil->provincia_id == $provincia->id ? 'selected' : ''}}
                            value="{{$provincia->id}}">
                                {{$provincia->nombre}}
                            </option>
                            @endforeach
                        </select>
                        @error('provincia_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="ciudad">Ciudad</label>
                        <input id="ciudad"
                        name="ciudad"
                        type="text"
                        placeholder="Ciudad"
                        class="form-control @error('ciudad') is-invalid @enderror"
                        value="{{ $perfil->ciudad }}">
                        @error('ciudad')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">Telefono</label>
                        <input type="text"
                        name="telefono"
                        class="form-control @error('telefono') is-invalid @enderror"
                        id="telefono"
                        placeholder="Telefono"
                        value="{{ $perfil->telefono }}">
                        @error('website')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        @if($perfil->imagen)
                            <div class="mt-4">
                                <p>Imagen actual</p>
                                <img src="{{ Storage::url($perfil->imagen ) }}" alt="" width="300px">
                            </div>
                            @error('imagen')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        @endif
                        <label class="mt-4" for="imagen">Editar imagen</label>
                        <input
                            class="form-control @error('imagen') is-invalid @enderror"
                            type="file"
                            id="imagen"
                            name="imagen">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Editar perfil"
                        class="btn btn-success float-right">
                    </div>
                </form>
            </div>
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
