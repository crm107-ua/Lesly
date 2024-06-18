<div class="col-md-7">
    <h2 class="font-thin m-b">Artistas <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
            <span class="bar1 a1 bg-primary lter"></span>
            <span class="bar2 a2 bg-info lt"></span>
            <span class="bar3 a3 bg-success"></span>
            <span class="bar4 a4 bg-warning dk"></span>
            <span class="bar5 a5 bg-danger dker"></span>
        </span></h2>
    <div class="row row-sm">
        @if(!$people->isEmpty())
        @foreach($people as $item)
        @if($item->artist==1)
        <div class="col-xs-6 col-sm-3">
            <div class="item">
                <div class="pos-rlt">
                    <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                            <a href="/user/{{$item->username}}"><i class="fa icon-earphones i-2x"></i></a>
                        </div>
                    </div>
                    <a href="#"><img src="{{$item->image}}" alt="" class="r r-2x img-full"></a>
                </div>
                <div class="padder-v">
                    <a href="/user/{{$item->username}}" class="text-ellipsis">{{$item->name}}</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @else
        <h3 style="position:relative; left: 38%; margin-top:5%;" class="font-thin ml-5 m-b text-center">No se han encontrado artistas o usuarios</h3>
        @endif
    </div>
</div>