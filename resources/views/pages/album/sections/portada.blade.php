<div class="row">
    <div class="col-sm-5">
        <img src="{{$album->image}}" style="border-radius:10px" class="img-full m-b">
    </div>
    <div class="col-sm-7">
        <h2 class="m-t-none text-black">{{$album->name}}</h2>
        <div class="clearfix m-b-lg">
            <a class="thumb-sm pull-left m-r">
                <img src="{{$album->artist->image}}" class="img-circle">
            </a>
            <div class="clear">
                <a href="/user/{{$album->artist->username}}" class="text-info">{{$album->artist->name}}</a>
                <a href="/social/{{$album->artist->username}}"><small class="block text-muted">{{$album->artist->followers->count()}} seguidores / {{$album->artist->followings->count()}} siguiendo</small></a>
            </div>
        </div>
        <div>
            @if($album->songs->isNotEmpty())
            Género: <a href="/gender/{{$album->songs[0]->genero->slug}}" class="badge bg-light">{{$album->songs[0]->genero->name}}</a>
            @else
            <span>No se puede determinar el género musica</span>
            @endif
            <br><br>
            <span>Fecha de estreno: </span>
            <div class="text-xs block m-t-xs m-b-md"><a></a>{{$album->estreno}}</div>
            <span>Descripción: </span>
            <div class="text-xs block m-t-xs m-b-md"><a></a>{{$album->descripcion}}</div>
        </div>
    </div>
</div>
<div class="m-t">
    <p>Todos los derechos reservados - {{$album->artist->name}} ©</p>
</div>