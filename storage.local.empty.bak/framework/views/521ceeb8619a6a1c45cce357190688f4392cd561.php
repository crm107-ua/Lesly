<div class="col-sm-8">
    <div class="panel wrapper-lg">
        <div class="row">
            <div class="col-sm-5">
                <img src="<?php echo e($song->image); ?>" class="img-full m-b" style="border-radius:15px">
                Tus playlysts <div style="position:relative;right:4%;margin-top:2%;"><?php echo $__env->make('layouts.playlists.playlists',['song' => $song], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
            </div>
            <div class="col-sm-7">
                <h2 class="m-t-none text-black"><?php echo e($song->name); ?></h2>
                <div class="clearfix m-b-lg">
                    <a href="<?php echo e($song->artist->image); ?>" class="thumb-sm pull-left m-r">
                        <img src="<?php echo e($song->artist->image); ?>" class="img-circle">
                    </a>
                    <div class="clear">
                        <a href="/user/<?php echo e($song->artist->username); ?>" class="text-primary"><?php echo e($song->artist->name); ?></a>
                        <a href="/social/<?php echo e($artist->username); ?>"><small class="block text-muted"><?php echo e($artist->followers->count()); ?> seguidores / <?php echo e($artist->followings->count()); ?> siguiendo</small></a>
                    </div>
                </div>
                <div>
                    <span>Género: </span><a href="/gender/<?php echo e($song->genero->slug); ?>" class="badge bg-light"><?php echo e($song->genero->name); ?></a><br><br>
                    <?php if($song->album): ?>
                    <span>Álbum: </span><a href="/album/<?php echo e($song->album->artist->username); ?>/<?php echo e($song->album->slug); ?>" class="label bg-primary"><?php echo e($song->album->name); ?></a><br><br>
                    <?php else: ?>
                    <span>Tipo de pista: </span><span class="label bg-primary">Single</span><br><br>
                    <?php endif; ?>
                    <span>Fecha de estreno: </span>
                    <div class="text-xs block m-t-xs m-b-md"><a></a><?php echo e($song->estreno); ?></div>
                    <span>Audiencia: </span>
                    <div class="text-xs block m-t-xs m-b-md"><a></a><?php echo e($song->reproducir->unique()->count()); ?> reproducciones</div>
                    <?php if($song->description): ?>
                    <p class="text-muted">
                        <span class="text-muted hide text-xs block m-t-xs m-b-md" id="moreless"> <?php echo e($song->description); ?></span>
                    </p>
                    <p>
                        <a href="#moreless" class="btn btn-sm btn-default" data-toggle="class:show">
                            <i class="fa fa-plus text"></i>
                            <span class="text">Mostrar descripción</span>
                            <i class="fa fa-minus text-active"></i>
                            <span class="text-active">Ocultar descripción</span>
                        </a>
                    </p><br>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class=" m-t">
            <p>Todos los derechos reservados - <?php echo e($song->artist->name); ?> ©</p>
        </div><?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/player/song.blade.php ENDPATH**/ ?>