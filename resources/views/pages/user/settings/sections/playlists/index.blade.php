<div class="tab-pane" id="playlists">
    <div class="text-center wrapper">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->playlists as $playlist)
                    <tr class="text-left">
                        <td>{{$playlist->name}}</td>
                        <td><img src="{{$playlist->image}}" style="border-radius:15%" alt="{{$playlist->name}}" width="50" height="50"></td>
                        <td>{{$playlist->description}}</td>
                        <td>
                            <a href="/mod-playlist/{{$playlist->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" action="{{route('del-playlist')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$playlist->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(Auth::user()->playlists->isEmpty())
            <span class="text-center m-t-md">No tienes playlists todavía</span>
            @endif
        </div>
    </div>
</div>