<aside class="aside bg-muted-only dk" id="sidebar">
    <section class="vbox animated fadeInUp">
        <section class="scrollable hover">
            <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto">

                <a href="/genders" class="list-group-item no-border
                @if(!$slug)
                active
                @endif">
                    Todos
                </a>

                @foreach($generos as $genero)
                <a href="/gender/{{$genero->slug}}" class="list-group-item no-border            
                @if($genero->slug==$slug)
                    active
                @endif">
                    {{$genero->name}}
                </a>
                @endforeach

            </div>
        </section>
    </section>
</aside>