<div class="panel">
    <div class="wrapper-lg">
        @if($event->comments->isNotEmpty())
        <section class="comment-list m-b-md">
            @foreach($event->comments as $comment)
            <article class="comment-item">
                <a class="pull-left thumb-sm">
                    <img src="{{$comment->user->image}}" class="img-circle" />
                </a>
                <section class="comment-body m-b-lg">
                    <header>
                        <a href="/user/{{$comment->user->username}}"><strong>{{$comment->user->name}}</strong></a>
                        @if($comment->user->id == Auth::user()->id)
                        <form style="float:right" action="{{route('del-comment')}}" method="POST">
                            @csrf
                            <input name="id" value="{{$comment->id}}" hidden></input>
                            <button type="submit" class="bg-danger">Eliminar
                            </button>
                        </form>
                        @else
                        @if($comment->user->artist)
                        <label class="label bg-success m-l-xs text-white">Artista</label>
                        @else
                        <label class="label bg-info m-l-xs">Usuario</label>
                        @endif
                        @endif
                        <span class="text-muted text-xs block m-t-xs">
                            {{$comment->fecha}}
                        </span>
                        <div class="m-t-sm m-b-md">
                            {{$comment->texto}}
                        </div>
                    </header>
                </section>
            </article>
            @endforeach
        </section>
        @endif
        <h4 class="m-t m-b">Deja tu comentario</h4>
        <form action="{{route('add-comment')}}" method="POST">
            @csrf
            <input name="event_id" value="{{$event->id}}" hidden></input>
            <input name="user_id" value="{{Auth::user()->id}}" hidden></input>
            <div class="form-group">
                <label>Texto</label>
                <textarea class="form-control" id="texto" name="texto" rows="5" placeholder="Escribe aquí tu comentario" maxlength="400" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>