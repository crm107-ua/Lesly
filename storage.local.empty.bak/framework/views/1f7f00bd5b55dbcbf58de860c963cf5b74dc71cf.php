<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">Letra</div>
        <div class="panel-body text-overflow-center">
            <article class="media">
                <div class="media-body">
                    <a style="position:relative; left:10%;" class="font-semibold"><?= wordwrap($song->letra, 50, "<br>") ?></a>
                </div>
            </article>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Acciones</div>
        <div class="panel-body text-overflow-center">
            <article class="media">
                <?php if($song->artist->id==Auth::user()->id): ?>
                <a href="/mod-song/<?php echo e($song->slug); ?>" class="btn btn-s-sm btn-info m-l-sm m-sm">Editar canción</a>
                <?php endif; ?>
                <?php if($song->video): ?>
                <a href="<?php echo e($song->video); ?>" class="btn btn-danger btn-s-sm m-sm"><i class="fa fa-fw fa-youtube-play"></i> YouTube</a>
                <?php endif; ?>
                <a href="https://www.facebook.com/sharer.php?u=<?php echo e(URL::current()); ?>" rel="me" title="Facebook" class="btn btn-primary btn-s-sm m-sm"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
                <a href="https://twitter.com/share?url=<?php echo e($song->video); ?>&text=<?php echo e(URL::current()); ?>" rel="me" title="Twitter" class="btn btn-info btn-s-sm m-sm"><i class="fa fa-fw fa-twitter"></i> Twitter</a>
            </article>
        </div>
    </div>
</div><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/player/acciones.blade.php ENDPATH**/ ?>