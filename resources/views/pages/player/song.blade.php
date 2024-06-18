<div class="col-sm-8">
    <div class="panel wrapper-lg">
        <div class="row">
            <div class="col-sm-5">
                <img src="{{$song->image}}" class="img-full m-b" style="border-radius:15px">
                Tus playlysts <div style="position:relative;right:4%;margin-top:2%;">@include('layouts.playlists.playlists',['song' => $song])</div>
            </div>
            <div class="col-sm-7">
                <h2 class="m-t-none text-black">{{$song->name}}</h2>
                <div class="clearfix m-b-lg">
                    <a href="{{$song->artist->image}}" class="thumb-sm pull-left m-r">
                        <img src="{{$song->artist->image}}" class="img-circle">
                    </a>
                    <div class="clear">
                        <a href="/user/{{$song->artist->username}}" class="text-primary">{{$song->artist->name}}</a>
                        <a href="/social/{{$artist->username}}"><small class="block text-muted">{{$artist->followers->count()}} seguidores / {{$artist->followings->count()}} siguiendo</small></a>
                    </div>
                </div>
                <div>
                    <span>Género: </span><a href="/gender/{{$song->genero->slug}}" class="badge bg-light">{{$song->genero->name}}</a><br><br>
                    @if($song->album)
                    <span>Álbum: </span><a href="/album/{{$song->album->artist->username}}/{{$song->album->slug}}" class="label bg-primary">{{$song->album->name}}</a><br><br>
                    @else
                    <span>Tipo de pista: </span><span class="label bg-primary">Single</span><br><br>
                    @endif
                    <span>Fecha de estreno: </span>
                    <div class="text-xs block m-t-xs m-b-md"><a></a>{{$song->estreno}}</div>
                    <span>Audiencia: </span>
                    <div class="text-xs block m-t-xs m-b-md"><a></a>{{$song->reproducir->unique()->count()}} reproducciones</div>
                    @if($song->description)
                    <p class="text-muted">
                        <span class="text-muted hide text-xs block m-t-xs m-b-md" id="moreless"> {{$song->description}}</span>
                    </p>
                    <p>
                        <a href="#moreless" class="btn btn-sm btn-default" data-toggle="class:show">
                            <i class="fa fa-plus text"></i>
                            <span class="text">Mostrar descripción</span>
                            <i class="fa fa-minus text-active"></i>
                            <span class="text-active">Ocultar descripción</span>
                        </a>
                    </p><br>
                    @else
                    @endif
                </div>
            </div>
        </div>
        <div class=" m-t">
            <p>Todos los derechos reservados - {{$song->artist->name}} ©</p>
        </div>