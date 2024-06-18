<div class="container">
    <div class="row">
        <h2 class="text-center">Tus álbums</h2>
        <div class="col-md-12">
            @if(Auth::user()->albums->isNotEmpty())
            <table id="albums" class="table table-hover  table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estreno</th>
                        <th>Descripción</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estreno</th>
                        <th>Descripción</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach(Auth::user()->albums as $album)
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->name}}</td>
                        <td>{{$album->estreno}}</td>
                        <td>{{$album->descripcion}}</td>
                        <td>{{$album->slug}}</td>
                        <td>
                            <a href="/mod-album/{{$album->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" style="float: right;" action="{{route('del-album')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$album->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-center">No has añadido ningún álbum</h4>
            @endif
        </div>
    </div>
</div>