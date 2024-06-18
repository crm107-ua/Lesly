<div class="tab-pane" id="albums">
    <div class="text-center wrapper">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Portada</th>
                        <th>Estreno</th>
                        <th>Descripcion</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->albums as $album)
                    <tr class="text-left">
                        <td>{{$album->name}}</td>
                        <td><img src="{{$album->image}}" style="border-radius:15%" alt="{{$album->name}}" width="50" height="50"></td>
                        <td>{{$album->estreno}}</td>
                        <td>{{$album->descripcion}}</td>
                        <td>{{$album->slug}}</td>
                        <td>
                            <a href="/mod-album/{{$album->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" action="{{route('del-album')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$album->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(Auth::user()->albums->isEmpty())
            <span class="text-center m-t-md">No tienes álbums todavía</span>
            @endif
        </div>
    </div>
</div>