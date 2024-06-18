@include('layouts.head.head')

<body class="">
    <section class="vbox">
        <header class="bg-muted-only header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo')

            @include('layouts.search.search_green')

            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-info dk nav-xs aside hidden-print" id="nav">
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
                    <section class="vbox">
                        @include('pages.generos.sections.genero')
                        @include('layouts.player.player',['mode'=>'info'])
                    </section>
                </section>
            </section>
        </section>
    </section>
    <script type="text/javascript">
        var songs = <?php echo json_encode($canciones); ?>;
    </script>
    @include('layouts.scripts.player_div');
</body>

</html>