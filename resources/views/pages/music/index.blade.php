@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_red')

            @include('layouts.search.search_green')

            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-danger dk nav-xs aside hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f-md scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                <!-- nav -->
                                @include('layouts.nav.blue_nav')
                                <!-- / nav -->
                            </div>
                        </section>
                        @include('layouts.cards.footer_user_card_blue')
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox" id="bjax-el">
                        <section class="scrollable wrapper-lg">
                            <div class="row">
                                <div class="col-sm-8">
                                    @include('pages.music.sections.mapa')
                                </div>
                                <div>
                                    @include('pages.music.sections.estadisticas')
                                </div>
                                <div class="col-lg-12">
                                    @include('pages.music.sections.songs')
                                </div>
                                <div class="col-lg-12">
                                    @include('pages.music.sections.albums')
                                </div>
                                <div class="col-lg-12">
                                    @include('pages.music.sections.playlists')
                                </div>
                                <div class="col-lg-12">
                                    @include('pages.music.sections.events')
                                </div>
                            </div>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    @include('layouts.scripts.event_scripts')
    @include('pages.music.scripts.data-scripts')
    @include('pages.music.scripts.data-table')

</body>

</html>