
<h4 class="m-t-lg m-b">Reproducir</h4>
    <ul class="list-group list-group-lg">
    <audio id="audio">
            <source src="<?php echo e($song->url); ?>" type="audio/mpeg">
            Tu navegador no soporta este reproductor
            </audio>
        <div>
        <span id="time"></span>
        <div id="wave_wrap">
        <div id="play_b" class="play_b play_i pause_i "></div>
        <div id="waveform" class="" >
            <div id="waveform_hover" ></div>
        </div>
        </div>
        </div>
    </ul>
</div> 

<?php echo $__env->make('pages.player.assets.estilos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages.player.assets.progressor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>








<?php /**PATH C:\Users\carom\Desktop\proyectos\Lesly\resources\views/pages/player/player.blade.php ENDPATH**/ ?>