<div class="col-md-5">
    <h2 class="font-thin">Usuarios<span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
            <span class="bar1 a1 bg-primary lter"></span>
            <span class="bar2 a2 bg-info lt"></span>
            <span class="bar3 a3 bg-success"></span>
            <span class="bar4 a4 bg-warning dk"></span>
            <span class="bar5 a5 bg-danger dker"></span>
        </span></h2>
    <div class="list-group bg-white list-group-lg no-bg auto">
        @foreach($people as $item => $value)
        @if($value->artist==0)
        <a href="/user/{{$value->username}}" class="list-group-item clearfix">
            <span class="pull-left thumb-sm avatar m-r">
                <img src="{{$value->image}}" alt="...">
            </span>
            <span class="clear">
                <span>{{$value->name}}</span>
                <small class="text-muted clear text-ellipsis">{{$value->followers->count()}} seguidores</small>
            </span>
        </a>
        @endif
        @endforeach
    </div>
</div>