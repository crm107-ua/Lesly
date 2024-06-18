<div class="col-md-5">
    <h3 class="font-thin">Top España</h3>
    <div class="list-group bg-white list-group-lg no-bg auto"> 
    @foreach($top as $item => $value)                         
        <a href="/song/{{$value->artist->username}}/{{$value->slug}}" class="list-group-item clearfix">
            <span class="pull-right h2 text-muted m-l">{{$item+1}}</span>
            <span class="pull-left thumb-sm avatar m-r">
            <img src="{{$value->image}}" alt="...">
            </span>
            <span class="clear">
            <span>{{$value->name}}</span>
            <small class="text-muted clear text-ellipsis">{{$value->artist->name}}</small>
            </span>
        </a>
    @endforeach
    </div>
</div>