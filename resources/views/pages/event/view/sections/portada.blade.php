<div class="panel">
    <!-- video player -->
    @if(!$event->stream)
    <div id="jp_container_1">
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>
    @else
    @include('pages.event.view.sections.stream.index')
    @endif

    <!-- / video player -->
    <div class="wrapper-lg">
        <h2 class="m-t-none text-black">
            {{$event->name}}
        </h2>
        @if($event->user->id!=Auth::user()->id)
        @if($event->followers()->find(Auth::user()->id)==null)
        <form role="search" action="{{route('follow-event')}}" method="POST">
            @csrf
            <input name="id" value="{{$event->id}}" hidden></input>
            <button type="submit" class="btn btn-s-md btn-success m-md" style="float:right;">Seguir</button>
        </form>
        @else
        <form role="search" action="{{route('unfollow-event')}}" method="POST">
            @csrf
            <input name="id" value="{{$event->id}}" hidden></input>
            <button type="submit" class="btn btn-s-md btn-default m-md" style="float:right;">Dejar de seguir</button>
        </form>
        @endif
        @endif
        <div class="post-sum">
            <p>
                {{$event->texto}}
            </p>
        </div>
        <div class="line b-b"></div>
        <div class="text-muted">
            <i class="fa fa-user icon-muted"></i> by
            <a href="/user/{{$event->user->username}}" class="m-r-sm">{{$event->user->name}}</a>
            <i class="fa fa-users icon-muted"></i> Seguidores:
            <a href="/social-event/{{$event->slug}}" class="m-r-sm">{{$event->followers->count()}}</a>
            <i class="fa fa-clock-o icon-muted"></i> {{$event->fecha->format('d-m-Y')}}
            <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i> {{$event->comments->count()}}
                comentarios</a>
        </div>
    </div>
</div>