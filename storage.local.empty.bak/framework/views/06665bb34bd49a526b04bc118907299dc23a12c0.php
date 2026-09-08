<!-- side content -->
<aside class="aside-md bg-muted dk" id="sidebar">
    <section class="vbox animated fadeInRight">
        <section class="w-f-md scrollable hover">
            <h4 class="font-thin m-l-md m-t">Tu círculo de amigos</h4>
            <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                <?php $__currentLoopData = Auth::user()->followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->escuchando): ?>
                <li class="list-group-item">
                    <span class="pull-left thumb-xs m-t-xs m-l-xs m-r-sm avatar">
                        <img src="<?php echo e($user->image); ?>" alt="<?php echo e($user->name); ?>" class="img-circle">
                        <i class="on b-light right sm"></i>
                    </span>
                    <div class="clear">
                        <div><a href="/user/<?php echo e($user->username); ?>"><?php echo e($user->name); ?></a></div>
                        <small class="text-muted">
                            <?php echo $user->escuchando ?>&nbsp;&nbsp;<i class="icon-volume-2 m-t-md"></i>
                        </small>
                    </div>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = Auth::user()->followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$user->escuchando): ?>
                <li class="list-group-item">
                    <span class="pull-left thumb-xs m-t-xs m-l-xs m-r-sm avatar">
                        <img src="<?php echo e($user->image); ?>" alt="<?php echo e($user->name); ?>" class="img-circle">
                        <i class="away b-light right sm"></i>
                    </span>
                    <div class="clear">
                        <div><a href="/user/<?php echo e($user->username); ?>"><?php echo e($user->name); ?></a></div>
                        <small class="text-muted">
                            Ausente
                        </small>
                    </div>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
    </section>
</aside>
<!-- / side content --><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/layouts/friends/blue_aside.blade.php ENDPATH**/ ?>