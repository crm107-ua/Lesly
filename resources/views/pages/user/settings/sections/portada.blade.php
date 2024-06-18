<aside class="aside-lg bg-light lter b-r">
    <section class="vbox">
        <section class="scrollable">
            <div class="wrapper">
                <div class="text-center m-b m-t">
                    <a href="/user/{{Auth::user()->username}}" class="thumb-lg">
                        <img src="{{Auth::user()->image}}" class="img-circle">
                    </a>
                    <div>
                        <div class="h3 m-t-xs m-b-xs">{{Auth::user()->name}}</div>
                        <a href="/user/{{Auth::user()->username}}"><small class="text-muted">{{Auth::user()->username}}</small></a>
                    </div>
                </div>
                <div class="panel wrapper">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a href="/social/{{Auth::user()->username}}">
                                <span class="m-b-xs h4 block">{{Auth::user()->followers->count()}}</span>
                                <small class="text-muted">Seguidores</small>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="/social/{{Auth::user()->username}}">
                                <span class="m-b-xs h4 block">{{Auth::user()->followings->count()}}</span>
                                <small class="text-muted">Siguiendo</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <small class="text-uc text-xs text-muted">Tipo de usuario</small>
                    @if(Auth::user()->artist)
                    <p>Artista&nbsp;&nbsp;<i class="fa icon-check"></i></p>
                    @else
                    <p>Usuario</p>
                    @endif
                    <small class="text-uc text-xs text-muted">Información</small>
                    <p>{{Auth::user()->description}}</p>
                    <div class="line"></div>
                    <small class="text-uc text-xs text-muted">Redes sociales</small>
                    <p class="m-t-sm">
                        <a href="{{Auth::user()->instagram}}" class="btn btn-rounded btn-icon"><i class="fa fa-instagram"></i></a>
                        <a href="{{Auth::user()->facebook}}" class="btn btn-rounded btn-icon"><i class="fa fa-facebook"></i></a>
                        <a href="{{Auth::user()->twitter}}" class="btn btn-rounded btn-icon"><i class="fa fa-twitter"></i></a>
                    </p>
                </div>
            </div>
        </section>
    </section>
</aside>