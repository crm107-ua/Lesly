<div class="panel panel-default">
    <div class="panel-heading">Temas a interpretar</div>
    <div class="panel-body">
        @if($event->canciones_en_evento->isNotEmpty())
        @foreach($event->canciones_en_evento as $song)
        <article class="media">
            <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="pull-left thumb-md m-t-xs">
                <img style="border-radius: 5px;" src="{{$song->image}}" />
            </a>
            <div class="media-body">
                <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="font-semibold">{{$song->name}}</a>
                <div class="text-xs block m-t-xs">
                    <a href="/user/{{$song->artist->username}}" class="m-b-lg">{{$song->artist->name}}</a><br>
                    @if($song->album)
                    <a href="/album/{{$song->artist->username}}/{{$song->album->slug}}">Del álbum {{$song->album->name}}</a>
                    @else
                    <a>Single</a>
                    @endif
                </div>
            </div>
        </article>
        @endforeach
        @else
        <span>No se han encontrado temas a interpretar</span>
        @endif
    </div>
</div>