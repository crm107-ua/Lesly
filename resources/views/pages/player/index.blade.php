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
        <section id="content" style="background-image: url('{{$song->fondo}}'); background-repeat: no-repeat; background-size: 100%">
          <section class="vbox" id="bjax-el">
            <section class="scrollable wrapper-lg">
              <div class="row">
                @include('pages.player.song')
                @include('pages.player.player')
              </div>
              @include('pages.player.acciones')
              <div class="col-sm-12">
                @include('pages.player.critica')
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