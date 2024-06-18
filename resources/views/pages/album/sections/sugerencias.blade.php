<div class="col-sm-4">
    <div class="panel panel-default">
        @if($album->songs->isNotEmpty())
        <div class="panel-heading">También puedes escuchar en género {{$album->songs[0]->genero->name}}</div>
        <div class="panel-body">
            @foreach($album->songs[0]->genero->songs->shuffle()->slice(0, 4) as $song)
            @if($song->album && $song->album->id != $album->id)
            <article class="media">
                <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="pull-left thumb-md m-t-xs">
                    <img src="{{$song->image}}" style="border-radius:5px">
                </a>
                <div class="media-body">
                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="font-semibold">{{$song->name}}</a>
                    <div class="text-xs block m-t-xs"><a href="/user/{{$song->artist->username}}">{{$song->artist->name}}</a></div>
                    <div class="text-xs block m-t-xs"><a href="/album/{{$song->album->artist->username}}/{{$song->album->slug}}">{{$song->album->name}}</a></div>
                </div>
            </article>
            @else
            <article class="media">
                <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="pull-left thumb-md m-t-xs">
                    <img src="{{$song->image}}" style="border-radius:5px">
                </a>
                <div class="media-body">
                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="font-semibold">{{$song->name}}</a>
                    <div class="text-xs block m-t-xs"><a href="/user/{{$song->artist->username}}">{{$song->artist->name}}</a></div>
                    <div class="text-xs block m-t-xs"><a href="/song/{{$song->artist->username}}/{{$song->slug}}">{{$song->name}}</a></div>
                </div>
            </article>
            @endif
            @endforeach
        </div>
        @else
        <div class="panel-body">
            <a>
                No se pueden recomendar canciones a partir de un álbum vacío
            </a>
            @endif
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Acciones</div>
            <div class="panel-body text-overflow-center">
                <article class="media">
                    @if($album->artist->id==Auth::user()->id)
                    <a href="/mod-album/{{$album->slug}}" class="btn btn-s-sm btn-info m-sm">Editar álbum</a>
                    @endif
                    <a href="/user/{{$album->artist->username}}" class="btn btn-danger btn-s-sm m-sm"><i class="fa fa-fw fa-user"></i> Artista</a>
                    <a href="https://www.facebook.com/sharer.php?u={{$album->name}}" rel="me" title="Facebook" class="btn btn-primary btn-s-sm m-sm"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
                    <a href="https://twitter.com/share?url={{$album->name}}&text={{$album->descripcion}}" rel="me" title="Twitter" class="btn btn-info btn-s-sm m-sm"><i class="fa fa-fw fa-twitter"></i> Twitter</a>
                </article>
            </div>
        </div>
    </div>