<div class="tab-pane active m-md" id="general">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Vaya!</strong> Parece que no se ha podido modificar el usuario.
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-sm-6">
        <form data-validate="parsley" action="{{route('mod-user')}}" method="POST">
            @csrf
            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4">Datos personales</span>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input name="name" type="text" class="form-control" value="{{Auth::user()->name}}" data-required="true">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="{{Auth::user()->username}}" data-required="true">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{Auth::user()->email}}" data-type="email" data-required="true">
                    </div>
                    <div class="form-group">
                        <label>Descipción (Opcional)</label>
                        <textarea name="description" class="form-control" rows="6" maxlength="400" data-required="true" placeholder="Escribe tu descripción">{{Auth::user()->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Instagram (Opcional)</label>
                        <input name="instagram" type="text" class="form-control" maxlength="100" data-required="false" value="{{Auth::user()->instagram}}">
                    </div>
                    <div class="form-group">
                        <label>Facebook (Opcional)</label>
                        <input name="facebook" type="text" class="form-control" maxlength="100" data-required="false" value="{{Auth::user()->facebook}}">
                    </div>
                    <div class="form-group">
                        <label>Twitter (Opcional)</label>
                        <input name="twitter" type="text" class="form-control" maxlength="100" data-required="false" value="{{Auth::user()->twitter}}">
                    </div>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <button type="submit" class="btn btn-success btn-s-xs">Guardar</button>
                </footer>
            </section>
        </form>
    </div>
    <div class="col-sm-6">
        <form data-validate="parsley" action="{{route('mod-password')}}" method="POST">
            @csrf
            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4">Contraseña</span>
                </header>
                <div class="panel-body">
                    <p class="text-muted">Cambia tu contraseña</p>
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label>Introduce una nueva contraseña</label>
                            <input id="password" name="password" type="password" class="form-control" minlength="8" maxlength="100" ame="password" required autocomplete="new-password">
                        </div>
                        <div class="col-sm-6">
                            <label>Confirma la contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" minlength="8" maxlength="100" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <button type="submit" class="btn btn-success btn-s-xs">Guardar</button>
                </footer>
            </section>
        </form>
    </div>
    <div class="col-sm-6">
        <form data-validate="parsley" action="{{route('mod-image')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="panel panel-default">
                <header class="panel-heading m-b-md">
                    <span class="h4">Imágen a cambiar</span>
                    <div class="btn-group m-xs" style="margin-bottom:2%">
                        <select id="tipo" name="tipo">
                            <option value="image">Perfil</option>
                            <option value="image2">Cabecera</option>
                            <option value="image3">Fondo 1</option>
                            <option value="image4">Fondo 2</option>
                        </select>
                    </div>
                </header>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Selecciona imágen</label>
                    <div class="col-sm-10">
                        <input id="imagen" name="imagen" type="file" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
                    </div>
                    <br><br>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <button type="submit" class="btn btn-success btn-s-xs">Guardar</button>
                </footer>
            </section>
        </form>
    </div>

    <div class="col-sm-6">
        <section class="panel panel-default portlet-item">
            <header class="panel-heading">
                <span class="h4">Información adicional</span>
            </header>
            <div class="list-group bg-white">
                <a class="list-group-item">
                    <i class="fa fa-fw icon-target"></i> Ciudad: {{$geoplugin['geoplugin_city']}}
                </a>
                <a class="list-group-item">
                    <i class="fa fa-fw icon-paper-plane"></i> Provincia: {{$geoplugin['geoplugin_regionName']}}
                </a>
                <a class="list-group-item">
                    <i class="fa fa-fw icon-pointer"></i> Pais: {{$geoplugin['geoplugin_countryName']}}
                </a>
                <a class="list-group-item">
                    <i class="fa fa-fw  icon-cursor"></i> Region: {{$geoplugin['geoplugin_continentName']}}
                </a>
            </div>
        </section>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/file-input/bootstrap-filestyle.min.js"></script>