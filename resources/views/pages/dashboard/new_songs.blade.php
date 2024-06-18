<div class="col-md-7">
    <h3 class="font-thin">Nuevos Temas</h3>
    <div class="row row-sm">

    @foreach($new_songs as $item)
    <div class="col-xs-6 col-sm-3">
        <div class="item">
        <div class="pos-rlt">
            <div class="item-overlay opacity r r-2x bg-black">
            <div class="center text-center m-t-n">
                <a href="/song/{{$item->artist->username}}/{{$item->slug}}"><i class="fa fa-play-circle i-2x"></i></a>
            </div>
            @include('layouts.playlists.playlists',['song' => $item])
            </div>
            <a href="#"><img src="{{$item->image}}" alt="" class="r r-2x img-full"></a>
        </div>
        <div class="padder-v">
            <a href="/song/{{$item->artist->username}}/{{$item->slug}}" class="text-ellipsis">{{$item->name}}</a>
            <a href="/user/{{$item->artist->username}}" class="text-ellipsis text-xs text-muted">{{$item->artist->name}}</a>
        </div>
        </div>
    </div>

    @endforeach

    </div>
</div>