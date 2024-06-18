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
                                <section class="panel panel-default">
                                    <header class="panel-heading">
                                        <h4>Seguidores de la playlist "{{$playlist->name}}"</h4>
                                    </header>
                                    <ul class="list-group alt">
                                        @foreach($playlist->followers as $item)
                                        <li class="list-group-item">
                                            <div class="media">
                                                <span class="pull-left thumb-sm"><img src="{{$item->image}}" alt="{{$item->name}}" class="img-circle"></span>
                                                @if($item->escuchando)
                                                <div class="pull-right text-success m-t-sm">
                                                    <i class="fa fa-circle"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div><a href="/user/{{$item->username}}">{{$item->name}}</a></div>
                                                    <small class="text-muted">Conectado</small>
                                                </div>
                                                @else
                                                <div class="pull-right text-warning m-t-sm">
                                                    <i class="fa fa-circle"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div><a href="/user/{{$item->username}}">{{$item->name}}</a></div>
                                                    <small class="text-muted">Ausente</small>
                                                </div>
                                                @endif
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </section>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    @include('layouts.scripts.scripts')
</body>

</html>