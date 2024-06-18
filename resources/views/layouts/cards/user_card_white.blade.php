<div class="navbar-right">
    <ul class="nav navbar-nav m-n hidden-xs nav-user user">
        <li class="dropdown">
            <a class="dropdown-toggle bg-muted clear" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                    <img src="{{Auth::user()->image}}" alt="..." width="100" height="100">
                </span>
                {{Auth::user()->name}} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">
                <li>
                    <span class="arrow top"></span>
                    <a href="/settings">Ajustes</a>
                </li>
                <li>
                    <a href="/user/{{Auth::user()->username}}">Perfil</a>
                </li>
                <li>
                    <a href="docs.html">Ayuda</a>
                </li>
                <li class="divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input value="Cerrar sesión" type="submit" class="btn btn-s-md btn-default btn-rounded" style="margin:5%; color:black;"></input>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>