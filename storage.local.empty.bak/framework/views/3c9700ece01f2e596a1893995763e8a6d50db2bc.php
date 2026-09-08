<div class="col-md-5">
    <h3 class="font-thin">Top España</h3>
    <div class="list-group bg-white list-group-lg no-bg auto"> 
    <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                         
        <a href="/song/<?php echo e($value->artist->username); ?>/<?php echo e($value->slug); ?>" class="list-group-item clearfix">
            <span class="pull-right h2 text-muted m-l"><?php echo e($item+1); ?></span>
            <span class="pull-left thumb-sm avatar m-r">
            <img src="<?php echo e($value->image); ?>" alt="...">
            </span>
            <span class="clear">
            <span><?php echo e($value->name); ?></span>
            <small class="text-muted clear text-ellipsis"><?php echo e($value->artist->name); ?></small>
            </span>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/dashboard/top_songs.blade.php ENDPATH**/ ?>