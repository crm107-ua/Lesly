<aside class="col-sm-5 no-padder" id="sidebar">
  <section class="vbox animated fadeInUp">
    <section class="scrollable">
      <div class="m-t-n-xxs item pos-rlt">
        <div class="top text-right">
          <span class="musicbar animate bg-success bg-empty inline m-r-lg m-t" style="width:25px;height:30px">
            <span class="bar1 a3 lter"></span>
            <span class="bar2 a5 lt"></span>
            <span class="bar3 a1 bg"></span>
            <span class="bar4 a4 dk"></span>
            <span class="bar5 a2 dker"></span>
          </span>
        </div>

        @include('pages.user.view.sections.portada')

        @foreach($user->songs as $song)
        <li class="list-group-item">
          <div class="pull-left">
            @include('layouts.playlists.playlists',['song' => $song])
          </div>
          <a class="jp-play-me m-r-sm pull-left">
            <i class="icon-control-play text"></i>
            <i class="icon-control-pause text-active"></i>
          </a>
          <div class="clear text-ellipsis">
            <span><a href="/song/{{$song->artist->username}}/{{$song->slug}}">{{$song->name}} </a></span>
            <span class="text-muted">
              @if($song->album)
              del álbum <a href="/album/{{$song->album->artist->username}}/{{$song->album->slug}}" class="m-r-sm">{{$song->album->name}}</a>
              @else
              -- Sencillo
              @endif
              de {{$song->estreno}}
            </span>
          </div>
        </li>
        @endforeach

        <li class="list-group-item">
          <div class="clear m-t-sm">
            <span class="pull-left text-xs m-l-sm m-r-sm"><a href="/social/{{$user->username}}">{{$user->followers->count()}} Seguidores</a></span>
            @if($user->artist)
            <span class="pull-left text-xs m-r-md">{{$user->reproducciones}} Interacciones</span>
            @endif
            <a href="{{$user->twitter}}" class="btn btn-rounded btn-sm btn-info m-r-sm m-b-sm"><i class="fa fa-fw fa-twitter"></i> Twitter</a>
            <a href="{{$user->facebook}}" class="btn btn-rounded btn-sm btn-primary m-r-sm m-b-sm"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
            <a href="{{$user->instagram}}" class="btn btn-rounded btn-sm btn-success m-b-sm"><i class="fa fa-fw fa-instagram"></i> Instagram</a>
          </div>
        </li>

        </ul>
    </section>
    @if($user->artist)
    @include('layouts.player.player',['mode'=>'dark'])
    @endif
  </section>
</aside>