@include('layouts.head.head')

<body class="">
  <section class="vbox">

    <header class="bg-black lter header header-md navbar navbar-fixed-top-xs">
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

              </div>
            </section>

            @include('layouts.cards.footer_user_card_blue')

          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="w-f-md">
              <section class="hbox stretch bg-black dker">

                <!-- songs content -->
                @include('pages.user.view.sections.songs')

                <!--  albums and playlists content -->
                @if($user->playlists->isNotEmpty() || $user->albums->isNotEmpty())
                @include('pages.user.view.sections.albums_playlists')
                @else
                <section class="col-sm-3"><br>
                  @if($user->playlists->isEmpty())
                  <div class="bottom gd bg-black wrapper-lg m-t-sm">
                    <span class="h3 font-thin">El usuario no ha añadido playlists todavía</span>
                  </div>
                  @endif
                  @if($user->albums->isEmpty())
                  <div class="bottom gd bg-black wrapper-lg m-t-sm">
                    <span class="h3 font-thin">El usuario no ha añadido álbumes todavía</span>
                  </div>
                  @endif
                  @if($user->events->isEmpty())
                  <div class="bottom gd bg-black wrapper-lg m-t-sm">
                    <span class="h3 font-thin">El usuario no ha realizado eventos todavía</span>
                  </div>
                  @endif
                </section>
                @endif

                <!--  events -->
                @if(!$user->events->isEmpty())
                @include('pages.user.view.sections.events')
                @endif

              </section>
            </section>
          </section>
        </section>
      </section>
      <script type="text/javascript">
        var songs = <?php echo json_encode($songs); ?>;
      </script>
      @include('layouts.scripts.player_user');
</body>

</html>