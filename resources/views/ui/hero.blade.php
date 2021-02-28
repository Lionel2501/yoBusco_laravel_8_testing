@section('hero')

<div class="hero-banner" style="background-image: url('{{url('/images/imgBanner.jpg')}}')">
    <form action="{{route('buscar.show')}}" class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-3 texto-buscar">
                <input type="search" name="busqueda" class="form-control"
                placeholder="Hacer una busqueda">
            </div>
            <div class="col-md-3">
                <select class="form-control"
                name="categoria_id" id="categoria">
                <option value="" selected disabled>--Categoria--</option>
                    @foreach($categorias as $categoria)
                    <option
                    value="{{$categoria->id}}">
                        {{$categoria->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 texto-buscar">
                <select class="form-control"
                name="provincia_id" id="provincia">
                <option value="" selected disabled>--Provincia--</option>
                    @foreach($provincias as $provincia)
                    <option
                    value="{{$provincia->id}}">
                        {{$provincia->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="submit" value="Buscar" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</div>

@endsection
