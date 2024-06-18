@include('layouts.head.head')

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
                    <section class="vbox bg-white">
                        <header class="header bg-light lter hidden-print">
                            <a href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Imprimir</a>
                            <p>Facturación de ingresos</p>
                        </header>
                        <section class="scrollable wrapper">
                            <img src="{{Auth::user()->image}}" class="dker" alt="{{Auth::user()->name}}" width="100" height="100">

                            <div class="row">
                                <div class="col-xs-6">
                                    <h4>{{Auth::user()->name}} - Inc.</h4>
                                    <p><a href="www.{{Auth::user()->slug}}.com">www.{{Auth::user()->slug}}.com</a></p>
                                    <p>{{Auth::user()->description}}</p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="h4">#{{rand()}}</p>
                                    <h5>{{now()->format('d-m-Y')}}</h5>
                                </div>
                            </div>
                            <div class="line"></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 60px">Fila</th>
                                        <th>Interacciones</th>
                                        <th style="width: 140px">Precio unitario</th>
                                        <th style="width: 90px">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{Auth::user()->reproducciones}}</td>
                                        <td>0.01€</td>
                                        <td>{{Auth::user()->reproducciones * 0.01}}€</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right no-border"><strong>Descuento de Lesly (10%)</strong></td>
                                        <td>{{round(Auth::user()->reproducciones * 0.01 * 10 /100,2)}}€</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
                                        <td><strong>{{round((Auth::user()->reproducciones * 0.01) - (Auth::user()->reproducciones * 0.01 * 10 /100),2)}}€</strong></td>
                                    </tr>
                                </tbody>
                            </table>
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