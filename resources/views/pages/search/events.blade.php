<section class="padder-md">
    <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin"></a>
    <h2 class="font-thin m-b">Eventos <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
            <span class="bar1 a1 bg-primary lter"></span>
            <span class="bar2 a2 bg-info lt"></span>
            <span class="bar3 a3 bg-success"></span>
            <span class="bar4 a4 bg-warning dk"></span>
            <span class="bar5 a5 bg-danger dker"></span>
        </span></h2>
    <div class="row row-sm">
        @if(!$events->isEmpty())
        @foreach($events as $item)
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="item">
                <div class="pos-rlt">
                    <div class="bottom">
                    </div>
                    <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                            <a href="/event/{{$item->user->username}}/{{$item->slug}}"><i class="icon-control-play i-2x"></i></a>
                        </div>
                    </div>
                    <a href="/event/{{$item->user->username}}/{{$item->slug}}"><img src="{{$item->image}}" alt="{{$item->image}}" class="r r-2x img-full"></a>
                </div>
                <div class="padder-v">
                    <a href="/event/{{$item->user->username}}/{{$item->slug}}" class="text-ellipsis">{{$item->name}}</a>
                    <a href="/user/{{$item->user->username}}" class="text-ellipsis text-xs text-muted">De {{$item->user->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <h3 class=" font-thin m-b text-center">No se han encontrado playlists</h3>
        @endif
</section>