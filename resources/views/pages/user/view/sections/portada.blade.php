<div class="bottom gd bg-info wrapper-lg">
    <span class="h2 font-thin">{{$user->name}}

        @if($user->artist)
        &nbsp;<i class="fa icon-check"></i>
        @endif

        @if($user->id==Auth::user()->id)
        <a href="/settings" class="btn btn-s-md btn-info mb-4" style="margin-bottom:10px; margin-left: 15px;">Editar perfil</a>
        @else
        @if($user->followers()->find(Auth::user()->id)==null)
        <form role="search" action="{{route('follow')}}" method="POST">
            @csrf
            <input name="id" value="{{$user->id}}" hidden></input>
            <button type="submit" class="btn btn-s-md btn-success" style="margin-top:4%">Seguir</button>
        </form>
        @else
        <form role="search" action="{{route('unfollow')}}" method="POST">
            @csrf
            <input name="id" value="{{$user->id}}" hidden></input>
            <button type="submit" class="btn btn-s-md btn-default" style="margin-top:4%">Dejar de seguir</a>
        </form>
        @endif
        @endif

    </span>
</div>
<img class="img-full" src="{{$user->image2}}" alt="{{$user->image2}}">
</div>
<ul class="list-group list-group-lg no-radius no-border no-bg m-t-n-xxs m-b-none auto">
    <li class="list-group-item">
        <div>
            <div class="title">{{$user->description}}</div>
            <div id="wave_wrap">
                <div id="play_b" class="play_b play_i pause_i "></div>
                <div id="waveform" class="">
                    <div id="waveform_hover"></div>
                </div>
            </div>
        </div>
    </li>