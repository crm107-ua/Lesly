<div class="tab-pane" id="canciones">
    <div class="text-center wrapper">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Álbum</th>
                        <th>Genero</th>
                        <th>Portada</th>
                        <th>Letra</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->songs as $song)
                    <tr class="text-left">
                        <td>{{$song->name}}</td>
                        @if($song->album_id)
                        <td>{{$song->album->name}}</td>
                        @else
                        <td>Single</td>
                        @endif
                        <td>{{$song->genero->name}}</td>
                        <td><img src="{{$song->image}}" style="border-radius:15%" alt="{{$song->name}}" width="50" height="50"></td>
                        <td>{{$song->letra}}</td>
                        <td>{{$song->slug}}</td>
                        <td>
                            <a href="/mod-song/{{$song->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" action="{{route('del-song')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$song->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(Auth::user()->songs->isEmpty())
            <span class="text-center m-t-md">No tienes canciones todavía</span>
            @endif
        </div>
    </div>
</div>