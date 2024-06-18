<div class="col-sm-4">
    <div class="panel panel-default">
        @if($playlist->canciones_en_playlist->isNotEmpty())
        <div class="panel-heading">Canciones relacionadas de género {{$playlist->canciones_en_playlist[0]->genero->name}}</div>
        <div class="panel-body">
            @foreach($playlist->canciones_en_playlist[0]->genero->songs->shuffle()->slice(0, 7) as $song)
            <article class="media">
                <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="pull-left thumb-md m-t-xs">
                    <img src="{{$song->image}}" style="border-radius:5px">
                </a>
                <div class="media-body">
                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="font-semibold">{{$song->name}}</a>
                    <div class="text-xs block m-t-xs"><a href="/user/{{$song->artist->username}}">{{$song->artist->name}}</a></div>
                    @if($song->album)
                    <div class="text-xs block m-t-xs"><a href="/album/{{$song->album->artist->username}}/{{$song->album->slug}}">{{$song->album->name}}</a></div>
                    @else
                    <div class="text-xs block m-t-xs"><a href="/song/{{$song->artist->username}}/{{$song->slug}}">{{$song->name}}</a></div>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="panel-body">
            <a>
                No se pueden mostrar sugerencias de una playlist vacia
            </a>
            @endif

        </div>

    </div>