<div class="panel">
    <div class="wrapper-lg">
        @if($song->criticas->isNotEmpty())
        <section class="comment-list m-b-md">
            @foreach($song->criticas as $critica)
            <article class="comment-item">
                <a class="pull-left thumb-sm">
                    <img src="{{$critica->user->image}}" class="img-circle" />
                </a>
                <section class="comment-body m-b-lg">
                    <header>
                        <a href="/user/{{$critica->user->username}}"><strong>{{$critica->user->name}}</strong></a>
                        @if($critica->user->id == Auth::user()->id)
                        <form style="float:right" action="{{route('del-critica')}}" method="POST">
                            @csrf
                            <input name="id" value="{{$critica->id}}" hidden></input>
                            <button type="submit" class="bg-danger">Eliminar
                            </button>
                        </form>
                        @else
                        @if($critica->user->artist)
                        <label class="label bg-success m-l-xs text-white">Artista</label>
                        @else
                        <label class="label bg-info m-l-xs">Usuario</label>
                        @endif
                        @endif
                        <span class="text-muted text-xs block m-t-xs">
                            {{$critica->fecha}}
                        </span>
                        <div class="m-t-sm m-b-sm">
                            {{$critica->texto}}
                        </div>
                        <span>{{$critica->estrellas}} <i class="icon-star text-warning"></i></span>
                    </header>
                </section>
            </article>
            @endforeach
        </section>
        @endif
        <h4 class="m-t m-b">Opinión</h4>
        <form action="{{route('add-critica')}}" method="POST">
            @csrf
            <fieldset>
                <span class="star-cb-group">
                    <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                    <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                    <input type="radio" id="rating-3" name="rating" value="3" checked="checked" /><label for="rating-3">3</label>
                    <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                    <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                    <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                </span>
            </fieldset>
            <input name="song_id" value="{{$song->id}}" hidden></input>
            <input name="user_id" value="{{Auth::user()->id}}" hidden></input>
            <div class="form-group">
                <label>Texto</label>
                <textarea class="form-control" id="texto" name="texto" rows="5" placeholder="Escribe aquí una crítica sobre este tema" maxlength="400" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>

@include('pages.player.assets.stars.styles')