@include('pages.calendar.assets.styles')

<body class="">
    <section class="vbox">
        <header class="bg-muted-only header header-md navbar navbar-fixed-top-xs">
            @include('layouts.logos.logo_purple')
            @include('layouts.search.search')
            @include('layouts.cards.user_card_white')
        </header>
        <section>
            <section class="hbox stretch">
                <aside class="bg-primary dk nav-xs aside hidden-print" id="nav">
                    <section class="vbox">
                        <section class="w-f-md scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                @include('layouts.nav.blue_nav')
                            </div>
                        </section>
                        @include('layouts.cards.footer_user_card_blue')
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable">
                            <section class="hbox">
                                <!-- .aside -->
                                <aside class="wrapper">
                                    <section class="panel no-border bg-light">
                                        <header class="panel-heading bg-primary clearfix">
                                            <div class="btn-group pull-right" data-toggle="buttons">
                                                <label class="btn btn-sm btn-bg btn-default active" id="monthview">
                                                    <input type="radio" name="options">Mes
                                                </label>
                                                <label class="btn btn-sm btn-bg btn-default" id="weekview">
                                                    <input type="radio" name="options">Semana
                                                </label>
                                                <label class="btn btn-sm btn-bg btn-default" id="dayview">
                                                    <input type="radio" name="options">Día
                                                </label>
                                            </div>
                                            <span class="m-t-xs inline text-white">
                                                Tus próximos eventos
                                            </span>
                                        </header>
                                        <div class="calendar" id="calendar">

                                        </div>
                                    </section>
                                </aside>
                                <!-- /.aside -->
                            </section>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    @include('pages.calendar.assets.scripts')

</body>

</html>