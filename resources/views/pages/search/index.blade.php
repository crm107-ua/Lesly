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
        <!-- .aside -->
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
          <section class="hbox stretch">
            <section>

              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin"></a>
                  <h2 class="font-thin m-b">Canciones <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                      <span class="bar1 a1 bg-primary lter"></span>
                      <span class="bar2 a2 bg-info lt"></span>
                      <span class="bar3 a3 bg-success"></span>
                      <span class="bar4 a4 bg-warning dk"></span>
                      <span class="bar5 a5 bg-danger dker"></span>
                    </span></h2>
                  @include('pages.search.first_content')

                  <div class="row">

                    @include('pages.search.artists')

                    @include('pages.search.users')

                  </div>

                  <div class="row">

                    @include('pages.search.playlists')

                  </div>

                  <div class="row">

                    @include('pages.search.events')

                  </div>

                </section>
              </section>
            </section>
            @include('layouts.friends.blue_aside')
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
</body>

@include('layouts.scripts.scripts');