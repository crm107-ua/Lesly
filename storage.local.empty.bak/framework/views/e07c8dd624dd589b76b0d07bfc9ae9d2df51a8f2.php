<?php echo $__env->make('layouts.head.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="">
  <section class="vbox">
    <header class="bg-muted-only header header-md navbar navbar-fixed-top-xs">
      <?php echo $__env->make('layouts.logos.logo_purple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts.search.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts.cards.user_card_white', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <section>
      <section class="hbox stretch">
        <aside class="bg-primary dk nav-xs aside hidden-print" id="nav">
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <?php echo $__env->make('layouts.nav.blue_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </section>
            <?php echo $__env->make('layouts.cards.footer_user_card_blue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </section>
        </aside>
        <section id="content" style="background-image: url('<?php echo e($song->fondo); ?>'); background-repeat: no-repeat; background-size: 100%">
          <section class="vbox" id="bjax-el">
            <section class="scrollable wrapper-lg">
              <div class="row">
                <?php echo $__env->make('pages.player.song', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('pages.player.player', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <?php echo $__env->make('pages.player.acciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="col-sm-12">
                <?php echo $__env->make('pages.player.critica', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <?php echo $__env->make('layouts.scripts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/player/index.blade.php ENDPATH**/ ?>