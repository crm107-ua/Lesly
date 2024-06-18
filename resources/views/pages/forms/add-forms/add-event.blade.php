@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_yellow')
            @include('layouts.search.search')
            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <aside class="bg-warning dk nav-xs aside hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f-md scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                @include('layouts.nav.black_nav')
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
                                    <strong>Vaya!</strong> Parece que no se ha podido crear el evento.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form id="wizardform" action="{{route('add-event')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <ul class="nav nav-tabs font-bold">
                                                <li><a href="#step1" data-toggle="tab">Paso 1</a></li>
                                                <li><a href="#step2" data-toggle="tab">Paso 2</a></li>
                                                <li><a href="#step3" data-toggle="tab">Paso 3</a></li>
                                            </ul>
                                        </div>
                                        <div class="panel-body">
                                            <h4>Completa los siguientes pasos para crear un evento</h4>
                                            <div class="line line-lg"></div>
                                            <h4>Proceso</h4>
                                            <div class="progress progress-xs m-t-md">
                                                <div class="progress-bar bg-warning"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="step1">
                                                    <p>Nombre:</p>
                                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" data-trigger="change" data-required="true" placeholder="Nombre del evento" maxlength="50">
                                                    <p class="m-t">Fecha de realización:</p>
                                                    <input class="input-sm input-s datepicker-input form-control" id="fecha" name="fecha" data-required="true" size="16" type="text" data-date-format="dd-mm-yyyy" />
                                                    <p class="m-t">Cartelera de canciones del eveto:</p>
                                                    <select name="songs[]" style="width:25%;" multiple class="chosen-select" data-required="true" required>
                                                        @foreach($songs as $song)
                                                        <option value="{{$song->id}}">{{$song->name}} de {{$song->artist->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="m-t">Introducción:</p>
                                                    <textarea type="text" id="description" name="description" data-trigger="change" data-required="false" maxlength="200" class="form-control" rows="6" data-required="true" placeholder="Introducción breve para tu evento">{{ old('description') }}</textarea>
                                                    <p class="m-t">Descripción:</p>
                                                    <textarea type="text" id="texto" name="texto" data-trigger="change" data-required="false" maxlength="2000" class="form-control" rows="6" data-required="true" placeholder="Descripción de tu evento">{{ old('texto') }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="step2">
                                                    <p>Imágen principal:</p>
                                                    <input type="file" id="image" name="image" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
                                                    <p class="m-t">Imágen de fondo 1:</p>
                                                    <input type="file" id="image2" name="image2" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
                                                    <p class="m-t">Imágen de fondo 2:</p>
                                                    <input type="file" id="image3" name="image3" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
                                                    <p class="m-t">Imágen de fondo 3:</p>
                                                    <input type="file" id="image4" name="image4" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
                                                </div>
                                                <div class="tab-pane" id="step3">
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