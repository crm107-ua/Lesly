@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_green')
            @include('layouts.search.search')
            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <aside class="bg-success dk nav-xs aside hidden-print" id="nav">
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
                                    <strong>Vaya!</strong> Parece que no se ha podido crear la playlist.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form id="wizardform" action="{{route('add-playlist')}}" method="POST" enctype="multipart/form-data">
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
                                            <h4>Completa los siguientes pasos para crear una playlist</h4>
                                            <div class="line line-lg"></div>
                                            <h4>Proceso</h4>
                                            <div class="progress progress-xs m-t-md">
                                                <div class="progress-bar bg-success"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="step1">
                                                    <p>Nombre:</p>
                                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" data-trigger="change" data-required="true" placeholder="Nombre de la playlist" maxlength="50">
                                                    <p class="m-t">Descripción:</p>
                                                    <textarea type="text" id="description" name="description" data-trigger="change" data-required="false" maxlength="200" class="form-control" rows="6" data-required="true" placeholder="Descripción para tu playlist (Opcional)">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="tab-pane" id="step2">
                                                    <p>Imágen de portada de la playlist:</p>
                                                    <input type="file" id="imagen" name="imagen" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" required>
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