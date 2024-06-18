<section class="col-sm-4 no-padder bg">
    <section class="vbox">

        <section class="scrollable hover">
            <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">

                @if(!$user->albums->isEmpty())
                <div class="item pos-rlt">
                    <a class="item-overlay active opacity wrapper-md font-xs">
                        <span class="block h3 font-bold text-danger-lter text-u-c">Álbumes</span>
                        <span class="text-muted">Por {{$user->name}}</span>
                    </a>
                    <a>
                        <img class="img-full" src="{{$user->image3}}" alt="{{$user->image3}}">
                    </a>
                </div>
                @foreach($user->albums as $album)
                <li class="list-group-item clearfix">
                    <a href="/album/{{$user->username}}/{{$album->slug}}" class="pull-left thumb-sm m-r">
                        <img src="{{$album->image}}" alt="...">
                    </a>
                    <a class="clear" href="/album/{{$user->username}}/{{$album->slug}}">
                        <span class="block text-ellipsis">{{$album->name}}</span>
                        <small class="text-muted">{{$album->estreno}}</small>
                    </a>
                </li>
                @endforeach
                @endif

                @if(!$user->playlists->isEmpty())
                <div class="item pos-rlt">
                    <a class="item-overlay active opacity wrapper-md font-xs">
                        <span class="block h3 font-bold text-warning-lter text-u-c">Playlists</span>
                        <span class="text-muted">Por {{$user->name}}</span>
                    </a>
                    <a>
                        <img class="img-full" src="{{$user->image4}}" alt="{{$user->image4}}">
                    </a>
                </div>
                @foreach($user->playlists as $playlist)
                <li class="list-group-item clearfix">
                    <a href="/playlist/{{$user->username}}/{{$playlist->slug}}" class="pull-left thumb-sm m-r">
                        <img src="{{$playlist->image}}" alt="...">
                    </a>
                    <a class="clear" href="/playlist/{{$user->username}}/{{$playlist->slug}}">
                        <span class="block text-ellipsis">{{$playlist->name}}</span>
                        <small class="text-muted">{{$playlist->canciones_en_playlist->count()}} canciones</small>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </section>

    </section>
</section>