<div id="basic" style="text-align:center;">
    <video class="videostream" autoplay="" controls></video>
    <audio class="audiostream" autoplay=""></audio>
    @if($event->user->id==Auth::user()->id)
    <p>
        <button class="capture-button btn-outline-warning m-r-md">Iniciar directo</button>
        <button id="stop-button">Detener</button>
    </p>
    @endif
</div>

@include('pages.event.view.sections.stream.assets.scripts')
@include('pages.event.view.sections.stream.assets.style')