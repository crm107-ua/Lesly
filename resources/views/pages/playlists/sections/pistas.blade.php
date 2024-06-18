<ul class="list-group list-group-lg">
    @if($playlist->canciones_en_playlist->isNotEmpty())
    @foreach($playlist->canciones_en_playlist as $song)
    <li class="list-group-item">
        @if($playlist->user->id == Auth::user()->id)
        <div class="pull-right m-l-4">
            @include('layouts.playlists.delete-song',['playlist'=>$playlist, 'song' => $song])
        </div>
        @endif
        <div class="pull-right m-l-4">
            @include('layouts.playlists.playlists',['song' => $song])
        </div>

        <a class="jp-play-me m-r-sm pull-left">
            <i class="icon-control-play text"></i>
            <i class="icon-control-pause text-active"></i>
        </a>

        <div class="clear text-ellipsis">
            <a href="/song/{{$song->artist->username}}/{{$song->slug}}">{{$song->name}}</a><span> de</span>
            <a href="/user/{{$song->artist->username}}">{{$song->artist->name}}</a>
            @if($song->album)
            del álbum <a href="/album/{{$song->album->artist->username}}/{{$song->album->slug}}">{{$song->album->name}}</a>
            @endif
        </div>
    </li>
    @endforeach
    @else
    <p>Esta playlist se encuentra vacía</p>
    @endif
</ul>