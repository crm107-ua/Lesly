<footer class="footer hidden-xs no-padder text-center-nav-xs">
    <div class="hidden-xs ">
        <div class="dropdown dropup wrapper-sm clearfix">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-left m-l-xs">
                    <img src="<?php echo e(Auth::user()->image); ?>" class="dker" alt="<?php echo e(Auth::user()->name); ?>" width="100" height="100">
                    <i class="on"></i>
                </span>
                <span class="hidden-nav-xs clear">
                    <span class="block m-l">
                        <strong class="font-bold text-lt"><?php echo e(Auth::user()->name); ?></strong>
                        <b class="caret"></b>
                    </span>
                    <span class="text-xs block m-l text-white"><?php echo e(Auth::user()->username); ?></span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight aside text-left">
                <li>
                    <span class="arrow bottom hidden-nav-xs"></span>
                    <a href="/settings">Ajustes</a>
                </li>
                <li>
                    <a href="profile.html">Perfil</a>
                </li>
                <li>
                    <a href="docs.html">Ayuda</a>
                </li>
                <li class="divider"></li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <input value="Cerrar sesión" type="submit" class="btn btn-s-md btn-default btn-rounded" style="margin:7%; color:black;"></input>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</footer><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/layouts/cards/footer_user_card_blue.blade.php ENDPATH**/ ?>