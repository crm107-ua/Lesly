<ul class="list-group list-group-lg">
    @foreach($album->songs as $song)
    <li class="list-group-item">
        <div class="pull-right m-l-4">
            @include('layouts.playlists.playlists',['song' => $song])
        </div>
        <a class="jp-play-me m-r-sm pull-left">
            <i class="icon-control-play text"></i>
            <i class="icon-control-pause text-active"></i>
        </a>
        <div class="clear text-ellipsis">
            <a href="/song/{{$song->artist->username}}/{{$song->slug}}">{{$song->name}}</a>
            <span class="text-muted"> de {{$song->artist->name}}</span>
        </div>
    </li>
    @endforeach
</ul>