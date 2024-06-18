@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo')
            @include('layouts.search.search')
            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <aside class="bg-info dk nav-xs aside hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f-md scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                @include('layouts.nav.blue_nav')
                            </div>
                        </section>
                        @include('layouts.cards.footer_user_card_blue')
                    </section>
                </aside>
                <section id="content">
                    <section class="vbox" id="bjax-el">
                        <section class="scrollable wrapper-lg">
                            <div class="col-sm-12">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Vaya!</strong> Parece que no se ha podido modificar la canción.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form id="wizardform" action="{{route('mod-song-post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <ul class="nav nav-tabs font-bold">
                                                <li><a href="#step1" data-toggle="tab">Paso 1</a></li>
                                                <li><a href="#step2" data-toggle="tab">Paso 2</a></li>
                                            </ul>
                                        </div>
                                        <div class="panel-body">
                                            <h4>Completa los siguientes pasos para modificar la canción "{{$song->name}}"</h4>
                                            <div class="line line-lg"></div>
                                            <h4>Proceso</h4>
                                            <div class="progress progress-xs m-t-md">
                                                <div class="progress-bar bg-info"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="step1">
                                                    <input id="song_slug" name="song_slug" type="hidden" value="{{$song->slug}}">
                                                    <p>Nombre:</p>
                                                    <input type="text" id="name" name="name" value="{{ $song->name }}" class="form-control" data-trigger="change" data-required="true" placeholder="Nombre de la canción" maxlength="100"><br>
                                                    <p>Género:</p>
                                                    <select id="genero" name="genero" style="width:260px" class="chosen-select" data-trigger="change" data-required="true">
                                                        @foreach($generos as $genero)
                                                        @if($song->genero->id == $genero->id)
                                                        <option value="{{$genero->id}}" selected>{{$genero->name}}</option>
                                                        @else
                                                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select><br><br>
                                                    <p>Álbum:</p>
                                                    <select id="album" name="album" style="width:260px" class="chosen-select" data-trigger="change" data-required="true">
                                                        <optgroup label="Con álbum">
                                                            @foreach(Auth::user()->albums as $album)
                                                            @if($song->album_id == $album->id)
                                                            <option value="{{$album->id}}" selected>{{$album->name}}</option>
                                                            @else
                                                            <option value="{{$album->id}}">{{$album->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Sin álbum">
                                                            @if($song->album_id == null)
                                                            <option value="null" selected>Sencillo</option>
                                                            @else
                                                            <option value="null">Sencillo</option>
                                                            @endif
                                                        </optgroup>
                                                    </select><br><br>
                                                    <p>Imágen de portada (Debe de ser lo más cuadrada posible):</p>
                                                    <input type="file" id="imagen" name="imagen" class="filestyle" data-trigger="change" data-icon="false" data-required="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"><br><br>
                                                    <p>Canción en formato mp3:</p>
                                                    <input type="file" id="cancion" name="cancion" class="filestyle" data-trigger="change" data-icon="false" data-required="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                                                    <hr>
                                                    <p class="m-t">Fondo (Opcional):</p>
                                                    <input type="file" id="fondo" name="fondo" class="filestyle" data-icon="false" data-required="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                                                    <hr>
                                                    <p class="m-t">Letra:</p>
                                                    <textarea type="text" id="letra" name="letra" data-trigger="change" data-required="true" class="form-control" rows="6" data-required="true" maxlength="2000" placeholder="Letra de tu canción">{{ $song->letra }}</textarea>
                                                    <p class="m-t">Link del videoclip (Opcional):</p>
                                                    <textarea type="text" id="video" name="video" data-trigger="change" data-required="false" class="form-control" rows="6" placeholder="Introduce el link del videoclip" maxlength="200">{{ $song->video }}</textarea>
                                                    <p class="m-t">Descripción alternativa (Opcional):</p>
                                                    <textarea type="text" id="descripcion" name="descripcion" data-trigger="change" data-required="false" class="form-control" rows="6" placeholder="Introduce una descripción alternativa" maxlength="450">{{ $song->description }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="step2">
                                                    <footer class="text-center lter">
                                                        <button type="submit" class="btn btn-success btn-s-xs">Finalizar</button>
                                                    </footer>
                                                </div>
                                                <ul class="pager wizard m-b-sm">
                                                    <li class="previous"><a>Retroceder</a></li>
                                                    <li class="next"><a>Siguiente</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    @include('pages.forms.scripts.scripts')
</body>

</html>
