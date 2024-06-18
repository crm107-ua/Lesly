<div class="row row-sm">
    @foreach($explorer as $item)
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <div class="item">
        <div class="pos-rlt">
            <div class="bottom">
            </div>
            <div class="item-overlay opacity r r-2x bg-black">
            <div class="center text-center m-t-n">
                <a href="/song/{{$item->artist->username}}/{{$item->slug}}"><i class="icon-control-play i-2x"></i></a>
            </div>
            @include('layouts.playlists.playlists',['song' => $item])    
            </div>
            <a href=""><img src="{{$item->image}}" alt="" class="r r-2x img-full"></a>
        </div>
        <div class="padder-v">
            <a href="/song/{{$item->artist->username}}/{{$item->slug}}" class="text-ellipsis">{{$item->name}}</a>
            <a href="/user/{{$item->artist->username}}" class="text-ellipsis text-xs text-muted">{{$item->artist->name}}</a>
        </div>
        </div>
    </div>
    @endforeach
</div>