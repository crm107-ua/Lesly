<?php echo $__env->make('layouts.head.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="">
  <section class="vbox">
    <header class="bg-muted-only header header-md navbar navbar-fixed-top-xs">
      <?php echo $__env->make('layouts.logos.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts.search.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts.cards.user_card_white', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>


    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-info dk nav-xs aside hidden-print" id="nav">
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                <?php echo $__env->make('layouts.nav.blue_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </div>
            </section>

            <?php echo $__env->make('layouts.cards.footer_user_card_blue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          </section>
        </aside>
        <!-- /.aside -->

        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                  <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin"></a>
                  <h2 class="font-thin m-b">Explora <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                      <span class="bar1 a1 bg-primary lter"></span>
                      <span class="bar2 a2 bg-info lt"></span>
                      <span class="bar3 a3 bg-success"></span>
                      <span class="bar4 a4 bg-warning dk"></span>
                      <span class="bar5 a5 bg-danger dker"></span>
                    </span></h2>

                  <?php echo $__env->make('pages.dashboard.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <?php echo $__env->make('pages.dashboard.first_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <div class="row">

                    <?php echo $__env->make('pages.dashboard.new_songs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('pages.dashboard.top_songs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  </div>

                </section>

              </section>
            </section>

            <?php echo $__env->make('layouts.friends.blue_aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          </section>
        </section>
      </section>
      <?php echo $__env->make('layouts.player.player',['mode'=>'info'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

  </section>

</body>

<?php echo $__env->make('layouts.scripts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/dashboard/index.blade.php ENDPATH**/ ?>