<?php echo $__env->make('layouts.head.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xl">
      <img class="logo_login" src="images/logos/Logo_3.png">
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Inicio de sesión</strong>
        </header>
        <form method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control rounded input-lg text-center no-border" name="email" value="<?php echo e(old('email', 'taylor@swift.es')); ?>" required autocomplete="email" autofocus>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control rounded input-lg text-center no-border" name="password" value="12345" required autocomplete="current-password">

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback m-md" role="alert">
              <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Iniciar sesión</span></button>
          <div class="text-center m-t m-b"><a href="<?php echo e(route('password.request')); ?>"><small>¿Has olvidado tu contraseña?</small></a></div>
          <div class="line line-dashed"></div>
          <a href="/register" class="btn btn-lg btn-info btn-block rounded">Crea una nueva cuenta</a>
          <a href="<?php echo e(route('social.auth', 'facebook')); ?>" class="btn btn-lg btn-info btn-block rounded"><i class="fa fa-facebook m-r-md"></i> Regístrate con Facebook</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
         <small><b>Uso exclusivo para fines educativos</b></small>
	 <br>
         <small>Desarrollado por Carlos Robles<br>&copy; 2020 - <?php echo date("Y"); ?></small>
      </p>
    </div>
  </footer>
  <?php echo $__env->make('layouts.scripts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/auth/login.blade.php ENDPATH**/ ?>