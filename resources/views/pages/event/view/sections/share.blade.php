<div class="panel panel-default">
    <div class="panel-heading">Acciones</div>
    <div class="panel-body text-overflow-center">
        <article class="media">
            @if($event->user->id==Auth::user()->id)
            <a href="/mod-event/{{$event->slug}}" class="btn btn-s-sm btn-info m-l-sm m-sm">Editar</a>
            @if(!$event->stream)
            <form role="search" style="float: left;" action="{{route('play-event')}}" method="POST">
                @csrf
                <input name="slug" value="{{$event->slug}}" hidden></input>
                <button type="submit" class="btn btn-success btn-s-sm m-sm"><i class="fa fa-fw fa-play"></i> Iniciar</button>
            </form>
            @else
            <form role="search" style="float: left;" action="{{route('pause-event')}}" method="POST">
                @csrf
                <input name="slug" value="{{$event->slug}}" hidden></input>
                <button type="submit" class="btn btn-danger btn-s-sm m-sm"><i class="fa fa-fw fa-pause"></i> Detener</button>
            </form>
            @endif
            @endif
            <a href="https://www.facebook.com/sharer.php?u={{URL::current()}}" rel="me" title="Facebook" class="btn btn-primary btn-s-sm m-sm"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
            <a href="https://twitter.com/share?url={{$event->slug}}&text={{URL::current()}}" rel="me" title="Twitter" class="btn btn-info btn-s-sm m-sm"><i class="fa fa-fw fa-twitter"></i> Twitter</a>
        </article>
    </div>
</div>