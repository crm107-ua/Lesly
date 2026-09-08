<!-- nav -->
<nav class="nav-primary hidden-xs">
    <ul class="nav dk clearfix">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs"></li>
        <li>
            <a href="/">
                <i class="icon-disc icon"></i>
                <span class="font-bold">Novedades</span>
            </a>
        </li>
        <li>
            <a href="/genders">
                <i class="icon-music-tone-alt icon"></i>
                <span class="font-bold">Generos</span>
            </a>
        </li>
        <li>
            <a href="/calendar">
                <i class="icon-calendar icon"></i>
                <span class="font-bold">Calendario</span>
            </a>
        </li>
        <?php if(Auth::user()->artist): ?>
        <li>
            <a href="/music">
                <i class="icon-graph icon"></i>
                <span class="font-bold">Tu música</span>
            </a>
        </li>
        <?php endif; ?>
        <li class="m-b hidden-nav-xs"></li>
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Sobre tí
        </li>
        <li>
            <a>
                <i class="icon-playlist icon text-lter"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->playlists->count()); ?></b>
                <span class="font-bold">Tus Playlists</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-playlist" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Crear playlist</span>
                    </a>
                </li>
                <?php if(Auth::user()->playlists->isNotEmpty()): ?>
                <?php $__currentLoopData = Auth::user()->playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/playlist/<?php echo e($playlist->user->username); ?>/<?php echo e($playlist->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e($playlist->name); ?></span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </li>
        <?php if(Auth::user()->artist): ?>
        <li>
            <a>
                <i class="icon-music-tone icon text-lter"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->songs->count()); ?></b>
                <span class="font-bold">Tus Canciones</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-song" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir canción</span>
                    </a>
                </li>
                <?php if(Auth::user()->songs->isNotEmpty()): ?>
                <?php $__currentLoopData = Auth::user()->songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/song/<?php echo e($song->artist->username); ?>/<?php echo e($song->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e(explode(" ", $song->name)[0]); ?>

                            <?php if(isset(explode(" ", $song->name)[1])): ?>
                            <span>...</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </li>
        <li>
            <a>
                <i class="icon-list icon text-lter"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->albums->count()); ?></b>
                <span class="font-bold">Tus Álbums</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-album" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir álbum</span>
                    </a>
                </li>
                <?php if(Auth::user()->albums->isNotEmpty()): ?>
                <?php $__currentLoopData = Auth::user()->albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/album/<?php echo e($album->artist->username); ?>/<?php echo e($album->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e(explode(" ", $album->name)[0]); ?>

                            <?php if(isset(explode(" ", $album->name)[1])): ?>
                            <span>...</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </li>
        <li>
            <a>
                <i class="icon-microphone icon text-lter"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->events->count()); ?></b>
                <span class="font-bold">Tus Eventos</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-event" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir evento</span>
                    </a>
                </li>
                <?php if(Auth::user()->events->isNotEmpty()): ?>
                <?php $__currentLoopData = Auth::user()->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/event/<?php echo e($event->user->username); ?>/<?php echo e($event->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e(explode(" ", $event->name)[0]); ?>

                            <?php if(isset(explode(" ", $event->name)[1])): ?>
                            <span>...</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Siguiendo
        </li>
        <li>
            <a>
                <i class="icon-earphones icon"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->following_playlists->count()); ?></b>
                <span class="font-bold">Playlists</span>
            </a>
            <?php if(Auth::user()->following_playlists->isNotEmpty()): ?>
            <ul class="nav dk text-sm">
                <?php $__currentLoopData = Auth::user()->following_playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/playlist/<?php echo e($playlist->user->username); ?>/<?php echo e($playlist->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e(explode(" ", $playlist->name)[0]); ?>

                            <?php if(isset(explode(" ", $playlist->name)[1])): ?>
                            <span>...</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </li>
        <li>
            <a>
                <i class="icon-feed icon"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->following_events->count()); ?></b>
                <span class="font-bold">Eventos</span>
            </a>
            <?php if(Auth::user()->following_events->isNotEmpty()): ?>
            <ul class="nav dk text-sm">
                <?php $__currentLoopData = Auth::user()->following_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/event/<?php echo e($event->user->username); ?>/<?php echo e($event->slug); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e(explode(" ", $event->name)[0]); ?>

                            <?php if(isset(explode(" ", $event->name)[1])): ?>
                            <span>...</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </li>
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Usuarios que sigues
        </li>
        <li>
            <a>
                <i class="icon-users icon text"></i>
                <b class="badge dker pull-right font-bold"><?php echo e(Auth::user()->followings->count()); ?></b>
                <span class="font-bold">Usuarios</span>
            </a>
            <?php if(Auth::user()->followings->isNotEmpty()): ?>
            <ul class="nav dk text-sm">
                <?php $__currentLoopData = Auth::user()->followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/user/<?php echo e($item->username); ?>" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold"><?php echo e($item->name); ?></span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </li>
    </ul>
</nav>
<!-- / nav -->
<?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/layouts/nav/blue_nav.blade.php ENDPATH**/ ?>