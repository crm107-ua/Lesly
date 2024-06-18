<div class="tab-pane" id="eventos">
    <div class="text-center wrapper">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Image</th>
                        <th>Descripcion</th>
                        <th>Texto</th>
                        <th>Fecha</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->events as $event)
                    <tr class="text-left">
                        <td>{{$event->name}}</td>
                        <td><img src="{{$event->image}}" style="border-radius:15%" alt="{{$event->name}}" width="50" height="50"></td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->texto}}</td>
                        <td>{{$event->fecha->format('d-m-Y')}}</td>
                        <td>{{$event->slug}}</td>
                        <td>
                            <a href="/mod-event/{{$event->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" action="{{route('del-event')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$event->slug}}" hidden></input>
                                <button type="submit" class="btn"><i class="fa icon-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(Auth::user()->events->isEmpty())
            <span class="text-center m-t-md">No tienes eventos todavía</span>
            @endif
        </div>
    </div>
</div>