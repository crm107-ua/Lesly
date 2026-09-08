<div class="bottom padder m-b-sm">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <b class="icon-plus"></b>
    </a>
    <ul class="dropdown-menu animated fadeInRight">
        <li style="padding-left:25%; padding-top:5%">Tus playlists</li>
        <li class="divider"></li>
        <?php if(!Auth::user()->playlists->isEmpty()): ?>
        <?php $__currentLoopData = Auth::user()->playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="/add-to-playlist/<?php echo e($playlist->slug); ?>/<?php echo e($song->id); ?>"><?php echo e($playlist->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <li>
            <a>No tienes playlists</a>
        </li>
        <?php endif; ?>
    </ul>
</div><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/layouts/playlists/playlists.blade.php ENDPATH**/ ?>