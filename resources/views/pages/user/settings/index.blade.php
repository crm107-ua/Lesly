@include('layouts.head.head')

<body class="">
    <section class="vbox">

        <header class="bg-black header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_grey')

            @include('layouts.search.search_green')

            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-black dk nav-xs aside hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f-md scrollable">
                            @include('layouts.nav.blue_nav')
                        </section>
                        @include('layouts.cards.footer_user_card_blue')
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable">
                            <section class="hbox stretch">
                                @include('pages.user.settings.sections.portada')
                                @include('pages.user.settings.sections.content')
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    @include('layouts.scripts.scripts')
</body>

</html>