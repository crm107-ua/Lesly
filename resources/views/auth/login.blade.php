@include('layouts.head.head')

<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xl">
      <img class="logo_login" src="images/logos/Logo_3.png">
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Inicio de sesión</strong>
        </header>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control rounded input-lg text-center no-border" name="email" value="{{ old('email', 'taylor@swift.es') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control rounded input-lg text-center no-border" name="password" value="12345" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback m-md" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Iniciar sesión</span></button>
          <div class="text-center m-t m-b"><a href="{{ route('password.request') }}"><small>¿Has olvidado tu contraseña?</small></a></div>
          <div class="line line-dashed"></div>
          <a href="/register" class="btn btn-lg btn-info btn-block rounded">Crea una nueva cuenta</a>
          <a href="{{ route('social.auth', 'facebook') }}" class="btn btn-lg btn-info btn-block rounded"><i class="fa fa-facebook m-r-md"></i> Regístrate con Facebook</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Desarrollado por Carlos Robles<br>&copy; 2020</small>
      </p>
    </div>
  </footer>
  @include('layouts.scripts.scripts')
