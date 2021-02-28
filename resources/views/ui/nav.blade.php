@section('nav')
<nav class="navbar navbar-expand-md navbar-light categorias-bg">
    <div class="container">
        <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#categorias"
        aria-controls="categorias" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            Categorias
        </button>
        <div class="collapse navbar-collapse " id="categorias">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav w-100 d-flex justify-content-between">
                @foreach ($categorias as $categoria)
                <li class="nav-item">
                    @if(isset($anuncio) && $categoria->id == $anuncio->categoria_id)
                    <a class="link-select" href="{{route('categoria.show', ['categoria' => $categoria->id])}}">
                        {{ $categoria->nombre }}
                     </a>
                    @else
                    <a class="nav-link" href="{{route('categoria.show', ['categoria' => $categoria->id])}}">
                        {{ $categoria->nombre }}
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
@endsection
