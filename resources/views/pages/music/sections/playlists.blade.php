<div class="container">
    <div class="row">
        <h2 class="text-center">Tus playlists</h2>
        <div class="col-md-12">
            @if(Auth::user()->playlists->isNotEmpty())
            <table id="playlists" class="table table-hover  table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach(Auth::user()->playlists as $playlist)
                    <tr>
                        <td>{{$playlist->id}}</td>
                        <td>{{$playlist->name}}</td>
                        <td>{{$playlist->description}}</td>
                        <td>{{$playlist->slug}}</td>
                        <td>
                            <a href="/mod-playlist/{{$playlist->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" style="float: right;" action="{{route('del-playlist')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$playlist->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-center">No has añadido ninguna playlist</h4>
            @endif
        </div>
    </div>
</div>