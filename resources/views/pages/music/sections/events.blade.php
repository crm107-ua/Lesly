<div class="container">
    <div class="row">
        <h2 class="text-center">Tus eventos</h2>
        <div class="col-md-12">
            @if(Auth::user()->events->isNotEmpty())
            <table id="eventos" class="table table-hover  table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Texto</th>
                        <th>Fecha</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Texto</th>
                        <th>Fecha</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach(Auth::user()->events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->name}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->texto}}</td>
                        <td>{{$event->fecha->format('d-m-Y')}}</td>
                        <td>{{$event->slug}}</td>
                        <td>
                            <a href="/mod-event/{{$event->slug}}" class="btn"><i class="fa fa-edit text-info"></i></a>
                            <form role="search" style="float: right;" action="{{route('del-event')}}" method="POST">
                                @csrf
                                <input name="slug" value="{{$event->slug}}" hidden></input>
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