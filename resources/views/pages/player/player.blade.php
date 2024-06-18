
<h4 class="m-t-lg m-b">Reproducir</h4>
    <ul class="list-group list-group-lg">
    <audio id="audio">
            <source src="{{$song->url}}" type="audio/mpeg">
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

@include('pages.player.assets.estilos')
@include('pages.player.assets.progressor')








