<!-- side content -->
<aside class="aside-md bg-muted dk" id="sidebar">
    <section class="vbox animated fadeInRight">
        <section class="w-f-md scrollable hover">
            <h4 class="font-thin m-l-md m-t">Tu círculo de amigos</h4>
            <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                @foreach(Auth::user()->followings as $user)
                @if($user->escuchando)
                <li class="list-group-item">
                    <span class="pull-left thumb-xs m-t-xs m-l-xs m-r-sm avatar">
                        <img src="{{$user->image}}" alt="{{$user->name}}" class="img-circle">
                        <i class="on b-light right sm"></i>
                    </span>
                    <div class="clear">
                        <div><a href="/user/{{$user->username}}">{{$user->name}}</a></div>
                        <small class="text-muted">
                            <?php echo $user->escuchando ?>&nbsp;&nbsp;<i class="icon-volume-2 m-t-md"></i>
                        </small>
                    </div>
                </li>
                @endif
                @endforeach
                @foreach(Auth::user()->followings as $user)
                @if(!$user->escuchando)
                <li class="list-group-item">
                    <span class="pull-left thumb-xs m-t-xs m-l-xs m-r-sm avatar">
                        <img src="{{$user->image}}" alt="{{$user->name}}" class="img-circle">
                        <i class="away b-light right sm"></i>
                    </span>
                    <div class="clear">
                        <div><a href="/user/{{$user->username}}">{{$user->name}}</a></div>
                        <small class="text-muted">
                            Ausente
                        </small>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </section>
    </section>
</aside>
<!-- / side content -->