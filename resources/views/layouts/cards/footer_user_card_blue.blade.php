<footer class="footer hidden-xs no-padder text-center-nav-xs">
    <div class="hidden-xs ">
        <div class="dropdown dropup wrapper-sm clearfix">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-left m-l-xs">
                    <img src="{{Auth::user()->image}}" class="dker" alt="{{Auth::user()->name}}" width="100" height="100">
                    <i class="on"></i>
                </span>
                <span class="hidden-nav-xs clear">
                    <span class="block m-l">
                        <strong class="font-bold text-lt">{{Auth::user()->name}}</strong>
                        <b class="caret"></b>
                    </span>
                    <span class="text-xs block m-l text-white">{{Auth::user()->username}}</span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight aside text-left">
                <li>
                    <span class="arrow bottom hidden-nav-xs"></span>
                    <a href="/settings">Ajustes</a>
                </li>
                <li>
                    <a href="profile.html">Perfil</a>
                </li>
                <li>
                    <a href="docs.html">Ayuda</a>
                </li>
                <li class="divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input value="Cerrar sesión" type="submit" class="btn btn-s-md btn-default btn-rounded" style="margin:7%; color:black;"></input>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</footer>