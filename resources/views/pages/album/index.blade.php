@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_red')
            @include('layouts.search.search')
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
                        <footer class="footer hidden-xs no-padder text-center-nav-xs">
                            @include('layouts.cards.footer_user_card_blue')
                        </footer>
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox" id="bjax-el">
                        <section class="scrollable wrapper-lg">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="panel wrapper-lg">
                                        @include('pages.album.sections.portada')
                                        <h4 class="m-t-lg m-b">{{$album->songs->count()}} Pistas</h4>
                                        @include('pages.album.sections.pistas')
                                    </div>
                                </div>
                                @include('pages.album.sections.sugerencias')
                            </div>
                        </section>
                        @include('layouts.player.player',['mode'=>'danger'])
                    </section>
                </section>
            </section>
        </section>
    </section>
    <script type="text/javascript">
        var songs = <?php echo json_encode($songs); ?>;
    </script>
    @include('layouts.scripts.scripts');
</body>

</html>