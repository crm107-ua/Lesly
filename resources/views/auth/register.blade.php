@include('layouts.head.head')
<?php

use App\Http\Controllers\Auth\RegisterController;
?>

<body class="bg-info dker">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
            <img class="logo_login" src="images/logos/Logo_3.png">
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>Regístrate para acceder a millones de artistas</strong>
                </header>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Nombre" class="form-control rounded input-lg text-center no-border @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback m-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="Email" placeholder="Email" class="form-control rounded input-lg text-center no-border @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                        <span class="invalid-feedback m-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control rounded input-lg text-center @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" placeholder="Confirma la contraseña" class="form-control rounded input-lg text-center" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label">Como vas a usar tu cuenta?</label>
                        <select id="artist" name="artist" class="form-control m-b">
                            <option value="0">Usuario</option>
                            <option value="1">Artista</option>
                        </select>
                    </div>
                    <div class="form-group m-b">
                        <label class="col-sm-12 control-label">País:</label>
                        <select id="pais_id" name="pais_id" class="form-control m-b">
                            @foreach(RegisterController::paises() as $pais)
                            <option value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="checkbox i-checks m-t">
                        <label class="m-l">
                            <input type="checkbox" checked="" required /><i></i> Acepto la
                            <a href="#">política de privacidad</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                        <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Registrate</span>
                    </button>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center">
                        <small>Ya tienes una cuenta en Lesly?</small>
                    </p>
                    <a href="/login" class="btn btn-lg btn-info btn-block btn-rounded">Inicia sesión</a>
                </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p>
                <small>Desarrollado por Carlos Robles<br>&copy; 2020</small>
            </p>
        </div>
    </footer>
    @include('layouts.scripts.scripts')
</body>

</html>