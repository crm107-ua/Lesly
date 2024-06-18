<div class="container">
    <div class="row">
        <h2 class="text-center">Tus canciones</h2>
        <div class="col-md-12">
            @if(Auth::user()->songs->isNotEmpty())
            <table id="songs" class="table table-hover  table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Album</th>
                        <th>Reproducciones</th>
                        <th>Estreno</th>
                        <th>Letra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Album</th>
                        <th>Reproducciones</th>
                        <th>Estreno</th>
                        <th>Letra</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach(Auth::user()->songs as $song)
                    <tr>
                        <td>{{$song->id}}</td>
                        <td>{{$song->name}}</td>
                        <td>{{$song->genero->name}}</td>
                        @if($song->album)
                        <td>{{$song->album->name}}</td>
                        @else
                        <td>Sin álbum</td>
                        @endif
                        <td>{{$song->reproducir->unique()->count()}}</td>
                        <td>{{$song->estreno}}</td>
                        <td>{{$song->letra}}</td>
                        <td>
                            <a href="/mod-song/{{$song->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" style="float: right;" action="{{route('del-song')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$song->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-center">No has añadido ninguna canción</h4>
            @endif
        </div>
    </div>
</div>