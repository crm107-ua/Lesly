<section class="col-sm-3 no-padder lt">
    <section class="vbox">
        <section class="scrollable hover">
            @if(!$user->events->isEmpty())
            @foreach($user->events as $event)
            <div class="m-t-n-xxs">
                <div class="item pos-rlt">
                    <a href="/event/{{$user->username}}/{{$event->slug}}" class="item-overlay active opacity wrapper-md font-xs">
                        <span class="block h3 font-bold text-info">{{$event->name}}</span>
                        <span class="text-sm">{{$user->name}} {{$event->description}}</span><br>
                        <span class="text-sm">{{$event->followers->count()}} Seguidores</span>
                        <span class="bottom wrapper-md block">{{ date_format($event->fecha,'d-m-Y') }}<i class="icon-calendar pull-right"></i></span>
                    </a>
                    <a>
                        <img class="img-full" src="{{$event->image}}" alt="{{$event->image}}">
                    </a>
                </div>
                @endforeach
                @else
                <a class="item-overlay active opacity wrapper-md font-xs">
                    No existen eventos
                </a>
                @endif
        </section>
    </section>
</section>