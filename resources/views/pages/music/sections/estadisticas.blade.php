<div class="col-sm-4 text-center">
    <div class="h4 m-b">Estadísticas</div>
    <div>
        <div class="inline text-center">
            <div class="easypiechart" data-percent="{{Auth::user()->reproducciones / 5}}" data-bar-color="#5bc0de" data-line-width="4" data-loop="false" data-scale-color="white" data-rotate="0" data-size="100">
                <div><span class="step">{{Auth::user()->reproducciones}}</span></div>
            </div>
            <p class="text-info font-bold">Interacciones</p>
        </div>
        <div class="inline text-center">
            <div class="easypiechart" data-percent="{{Auth::user()->followers->count()}}" data-bar-color="#177bbb" data-line-width="4" data-loop="false" data-scale-color="white" data-rotate="0" data-size="100">
                <div><span class="step">{{Auth::user()->followers->count()}}</span></div>
            </div>
            <p class="text-primary font-bold">Seguidores</p>
        </div>
        <div class="inline text-center">
            <div class="easypiechart" data-percent="{{Auth::user()->reproducciones * 0.01}}" data-bar-color="#5cb85c" data-line-width="4" data-loop="false" data-scale-color="white" data-rotate="0" data-size="100">
                <div><span class="step">{{Auth::user()->reproducciones * 0.01}}€</span></div>
            </div>
            <a href="/factura">
                <p class="text-success font-bold">Ingresos <i class="icon-login"></i></p>
            </a>
        </div>
    </div>
</div>
<div class="col-sm-4 m-t-md text-center">
    <div class="h4 m-b">Tu contenido</div>
    <p class="m-b-xs">Canciones</p>
    <div class="progress progress-xs">
        <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="{{Auth::user()->songs->count()}}" style="width: <?php echo Auth::user()->songs->count() * 100 / 10 . "%" ?>;"></div>
    </div>
    <p class="m-b-xs">Álbums</p>
    <div class="progress progress-xs">
        <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="{{Auth::user()->albums->count()}}" style="width: <?php echo Auth::user()->albums->count() * 100 / 10 . "%" ?>;"></div>
    </div>
    <p class="m-b-xs">Playlists</p>
    <div class="progress progress-xs">
        <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="{{Auth::user()->playlists->count()}}" style="width: <?php echo Auth::user()->playlists->count() * 100 / 10 . "%" ?>;"></div>
    </div>
    <p class="m-b-xs">Eventos</p>
    <div class="progress progress-xs">
        <div class="progress-bar bg-warning lter" data-toggle="tooltip" data-original-title="{{Auth::user()->events->count()}}" style="width: <?php echo Auth::user()->events->count() * 100 / 10 . "%" ?>;"></div>
    </div>
</div>