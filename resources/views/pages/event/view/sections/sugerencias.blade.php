<div class="panel panel-default">
    <div class="panel-heading">Otros eventos</div>
    <div class="panel-body">
        @foreach($events->shuffle()->slice(1, 6) as $other)
        @if($other->id != $event->id)
        <article class="media">
            <a href="/event/{{$other->user->username}}/{{$other->slug}}" class="pull-left thumb-md m-t-xs">
                <img style="border-radius: 5px;" src="{{$other->image}}" />
            </a>
            <div class="media-body">
                <a href="/event/{{$other->user->username}}/{{$other->slug}}" class="font-semibold">{{$other->name}}</a>
                <div class="text-xs block m-t-xs">
                    <a href="/user/{{$other->user->username}}" class="m-b-lg">{{$other->user->name}}</a><br>
                </div>
            </div>
        </article>
        @endif
        @endforeach
    </div>
</div>