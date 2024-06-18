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
                <!-- .aside -->
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
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper-lg">
                            <div class="row">
                                <div class="col-sm-8">
                                    @include('pages.event.view.sections.portada')
                                </div>
                                <div class="col-sm-4">
                                    @include('pages.event.view.sections.songs')
                                    @include('pages.event.view.sections.sugerencias')
                                    @if(!$event->stream)
                                    @include('pages.event.view.sections.fotos')
                                    @endif
                                    @include('pages.event.view.sections.share')
                                </div>
                                <div class="col-sm-12">
                                    @include('pages.event.view.sections.comments')
                                </div>
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