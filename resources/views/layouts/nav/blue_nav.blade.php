<!-- nav -->
<nav class="nav-primary hidden-xs">
    <ul class="nav dk clearfix">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs"></li>
        <li>
            <a href="/">
                <i class="icon-disc icon"></i>
                <span class="font-bold">Novedades</span>
            </a>
        </li>
        <li>
            <a href="/genders">
                <i class="icon-music-tone-alt icon"></i>
                <span class="font-bold">Generos</span>
            </a>
        </li>
        <li>
            <a href="/calendar">
                <i class="icon-calendar icon"></i>
                <span class="font-bold">Calendario</span>
            </a>
        </li>
        @if(Auth::user()->artist)
        <li>
            <a href="/music">
                <i class="icon-graph icon"></i>
                <span class="font-bold">Tu música</span>
            </a>
        </li>
        @endif
        <li class="m-b hidden-nav-xs"></li>
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Sobre tí
        </li>
        <li>
            <a>
                <i class="icon-playlist icon text-lter"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->playlists->count()}}</b>
                <span class="font-bold">Tus Playlists</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-playlist" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Crear playlist</span>
                    </a>
                </li>
                @if(Auth::user()->playlists->isNotEmpty())
                @foreach(Auth::user()->playlists as $playlist)
                <li>
                    <a href="/playlist/{{$playlist->user->username}}/{{$playlist->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{$playlist->name}}</span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </li>
        @if(Auth::user()->artist)
        <li>
            <a>
                <i class="icon-music-tone icon text-lter"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->songs->count()}}</b>
                <span class="font-bold">Tus Canciones</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-song" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir canción</span>
                    </a>
                </li>
                @if(Auth::user()->songs->isNotEmpty())
                @foreach(Auth::user()->songs as $song)
                <li>
                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{explode(" ", $song->name)[0]}}
                            @isset(explode(" ", $song->name)[1])
                            <span>...</span>
                            @endisset
                        </span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </li>
        <li>
            <a>
                <i class="icon-list icon text-lter"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->albums->count()}}</b>
                <span class="font-bold">Tus Álbums</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-album" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir álbum</span>
                    </a>
                </li>
                @if(Auth::user()->albums->isNotEmpty())
                @foreach(Auth::user()->albums as $album)
                <li>
                    <a href="/album/{{$album->artist->username}}/{{$album->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{explode(" ", $album->name)[0]}}
                            @isset(explode(" ", $album->name)[1])
                            <span>...</span>
                            @endisset
                        </span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </li>
        <li>
            <a>
                <i class="icon-microphone icon text-lter"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->events->count()}}</b>
                <span class="font-bold">Tus Eventos</span>
            </a>
            <ul class="nav dk text-sm">
                <li>
                    <a href="/add-event" class="auto">
                        <i class="fa fa-plus icon"></i>
                        <span class="font-bold">Añadir evento</span>
                    </a>
                </li>
                @if(Auth::user()->events->isNotEmpty())
                @foreach(Auth::user()->events as $event)
                <li>
                    <a href="/event/{{$event->user->username}}/{{$event->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{explode(" ", $event->name)[0]}}
                            @isset(explode(" ", $event->name)[1])
                            <span>...</span>
                            @endisset
                        </span>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </li>
        @endif
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Siguiendo
        </li>
        <li>
            <a>
                <i class="icon-earphones icon"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->following_playlists->count()}}</b>
                <span class="font-bold">Playlists</span>
            </a>
            @if(Auth::user()->following_playlists->isNotEmpty())
            <ul class="nav dk text-sm">
                @foreach(Auth::user()->following_playlists as $playlist)
                <li>
                    <a href="/playlist/{{$playlist->user->username}}/{{$playlist->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{explode(" ", $playlist->name)[0]}}
                            @isset(explode(" ", $playlist->name)[1])
                            <span>...</span>
                            @endisset
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        <li>
            <a>
                <i class="icon-feed icon"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->following_events->count()}}</b>
                <span class="font-bold">Eventos</span>
            </a>
            @if(Auth::user()->following_events->isNotEmpty())
            <ul class="nav dk text-sm">
                @foreach(Auth::user()->following_events as $event)
                <li>
                    <a href="/event/{{$event->user->username}}/{{$event->slug}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{explode(" ", $event->name)[0]}}
                            @isset(explode(" ", $event->name)[1])
                            <span>...</span>
                            @endisset
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
    </ul>
    <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs font-bold">
            Usuarios que sigues
        </li>
        <li>
            <a>
                <i class="icon-users icon text"></i>
                <b class="badge dker pull-right font-bold">{{Auth::user()->followings->count()}}</b>
                <span class="font-bold">Usuarios</span>
            </a>
            @if(Auth::user()->followings->isNotEmpty())
            <ul class="nav dk text-sm">
                @foreach(Auth::user()->followings as $item)
                <li>
                    <a href="/user/{{$item->username}}" class="auto">
                        <i class="fa fa-angle-right text-xs"></i>
                        <span class="font-bold">{{$item->name}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
    </ul>
</nav>
<!-- / nav -->
