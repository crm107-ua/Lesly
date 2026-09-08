<div class="col-md-7">
    <h3 class="font-thin">Nuevos Temas</h3>
    <div class="row row-sm">

    <?php $__currentLoopData = $new_songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xs-6 col-sm-3">
        <div class="item">
        <div class="pos-rlt">
            <div class="item-overlay opacity r r-2x bg-black">
            <div class="center text-center m-t-n">
                <a href="/song/<?php echo e($item->artist->username); ?>/<?php echo e($item->slug); ?>"><i class="fa fa-play-circle i-2x"></i></a>
            </div>
            <?php echo $__env->make('layouts.playlists.playlists',['song' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <a href="#"><img src="<?php echo e($item->image); ?>" alt="" class="r r-2x img-full"></a>
        </div>
        <div class="padder-v">
            <a href="/song/<?php echo e($item->artist->username); ?>/<?php echo e($item->slug); ?>" class="text-ellipsis"><?php echo e($item->name); ?></a>
            <a href="/user/<?php echo e($item->artist->username); ?>" class="text-ellipsis text-xs text-muted"><?php echo e($item->artist->name); ?></a>
        </div>
        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/dashboard/new_songs.blade.php ENDPATH**/ ?>