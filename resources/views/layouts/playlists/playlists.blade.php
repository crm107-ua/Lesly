<div class="bottom padder m-b-sm">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <b class="icon-plus"></b>
    </a>
    <ul class="dropdown-menu animated fadeInRight">
        <li style="padding-left:25%; padding-top:5%">Tus playlists</li>
        <li class="divider"></li>
        @if(!Auth::user()->playlists->isEmpty())
        @foreach(Auth::user()->playlists as $playlist)
        <li>
            <a href="/add-to-playlist/{{$playlist->slug}}/{{$song->id}}">{{$playlist->name}}</a>
        </li>
        @endforeach
        @else
        <li>
            <a>No tienes playlists</a>
        </li>
        @endif
    </ul>
</div>