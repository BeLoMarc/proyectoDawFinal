@extends('layout/plantilla')
@section('formulario')
    <!-- NO SE PUEDE PONER UN ARCHIVO CON VALOR PREDETERMINADO PORQUE SERIA UNA VULNEABILIDAD CON RESPECTO AL CONTENIDO DEL DIRECOTORIO LOCAL -- >
                                <!-- es la url donde llamo al update de clis paraa actualizar-->
    <!-- si la ruta pide un parametro debemos pasarlo en el action -->
    <div class="row">
        @if ($mensaje = Session::get('fail'))
            <div class="alert alert-warning" role="alert">
                {{ $mensaje }}
            </div>
        @endif
    </div>
    </div>
    <div class="form">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>Corrige los siguientes errores:</p>
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cliente.update', Auth::user()->Id) }}" method="POST" enctype="multipart/form-data"
            id="editarCliente">
            @csrf
            @method('PUT')
            <!--El formulario mas correcto para actualizar es mediante el metodo put-->
            <div class="form__info">
                <label for="email" class="form__info__label">Email <strong>*</strong>:</label>
                <input type="email" class="form__controls" value="{{ Auth::user()->email }}" name="email"
                    id="correoCliente">
                <div id="malCorreoLoggin" class="invalid-feedback"></div>

            </div>
            <div class="form__info">
                <label for="Nombre" class="form__info__label">Nombre:</label>
                <input type="text" class="form__controls" placeholder="Nuevo Nombre" value="{{ Auth::user()->nombre }}"
                    name="nombre" id="nombreCliente">
                <div id="malNombreCliente" class="invalid-feedback"></div>

            </div>
            <div class="form__info">
                <label for="telefono" class="form__info__label">Telefono:</label>
                <input type="text" class="form__controls" placeholder="XXXXXXXXX" value="{{ Auth::user()->telefono }}"
                    name="telefono" id="telefonoCliente">
                <div id="malTelefonoCliente" class="invalid-feedback"></div>
            </div>

            <div class="form__info half">
                <input id="botonEditarCliente" class="form__info__button" type="submit" value="Actualizar Perfil" />
            </div>
            <div class="form__info half">
                <a class="form__info__button other" href="{{ route('inicio.inicio') }}">pagina principal</a>

            </div>
        </form>
    </div>
    <script src="{{ asset('/JS/EditarCliente.js') }}"></script>
@endsection
