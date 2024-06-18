<div class="row">
    <div class="col-sm-5">
        <img src="{{$playlist->image}}" style="border-radius:10px" class="img-full m-b">
    </div>
    <div class="col-sm-7">
        <h2 class="m-t-none text-black">{{$playlist->name}}</h2>
        @if($playlist->description)
        <p class="m-b-lg">{{$playlist->description}}</p>
        @endif
        <div class="clearfix m-b-lg">
            <a class="thumb-sm pull-left m-r">
                <img src="{{$playlist->user->image}}" class="img-circle">
            </a>
            <div class="clear">
                <a href="/user/{{$playlist->user->username}}" class="text-success">Creada por {{$playlist->user->name}}</a>
                <small class="block text-muted"><a href="/social/{{$playlist->user->username}}">{{$playlist->user->followers->count()}} seguidores / {{$playlist->user->followings->count()}} siguiendo</a></small>
            </div>
        </div>
        <div>
            @if(!$playlist->canciones_en_playlist->isEmpty())
            Género destacado: <a href="/gender/{{$playlist->canciones_en_playlist[0]->genero->slug}}" class="badge bg-light">{{$playlist->canciones_en_playlist[0]->genero->name}}</a>
            @else
            <a>No se detecta ningún tema</a>
            @endif
            <br><br>
            <a href="/social-playlist/{{$playlist->slug}}">Esta playlist tiene {{$playlist->followers->count()}} seguidores</a>
        </div>
    </div>
    @include('pages.playlists.sections.following')
</div>
<div class="m-t">
    <p>Todos los derechos reservados - {{$playlist->user->name}} ©</p>
</div>