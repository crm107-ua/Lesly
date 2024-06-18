<section class="w-f-md" style="margin-bottom:5%" id="bjax-target">
    <section class="hbox stretch">
        <!-- side content -->
        @include('pages.generos.sections.list')
        <!-- / side content -->
        <section>
            <section class="vbox">
                @if($slug)
                <section class="scrollable padder-lg">
                    <h2 class="font-thin m-b">{{$genero->name}}</h2>
                    <div class="row row-sm">

                        @if($canciones)
                        @foreach($genero->songs as $key => $song)
                        <div id="{{$key}}" class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="item">
                                <div class="pos-rlt">
                                    <div class="item-overlay opacity r r-2x bg-black">
                                        <a class="jp-play-me center text-center m-t-n">
                                            <i class="fa fa-play-circle i-2x text"></i>
                                            <i class="fa fa-pause text-active"></i>
                                        </a>
                                        @include('layouts.playlists.playlists',['song' => $song])
                                    </div>
                                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}"><img src="{{$song->image}}" alt="{{$song->image}}" class="r r-2x img-full"></a>
                                </div>
                                <div class="padder-v">
                                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="text-ellipsis">{{$song->name}}</a>
                                    <a href="/user/{{$song->artist->username}}" class="text-ellipsis text-xs text-muted">{{$song->artist->name}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h3 class="font-thin text-center">No exiten canciones de este género</h3>
                        @endif
                </section>
                @else
                <section class="scrollable padder-lg">
                    <h2 class="font-thin m-b">Todos los generos</h2>
                    <div class="row row-sm">
                        @foreach($songs as $key => $song)
                        <div id="{{$key}}" class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="item">
                                <div class="pos-rlt">
                                    <div class="item-overlay opacity r r-2x bg-black">
                                        <a class="jp-play-me center text-center m-t-n">
                                            <i class="fa fa-play-circle i-2x text"></i>
                                            <i class="fa fa-pause text-active"></i>
                                        </a>
                                        @include('layouts.playlists.playlists',['song' => $song])
                                    </div>
                                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}"><img src="{{$song->image}}" alt="{{$song->image}}" class="r r-2x img-full"></a>
                                </div>
                                <div class="padder-v">
                                    <a href="/song/{{$song->artist->username}}/{{$song->slug}}" class="text-ellipsis">{{$song->name}}</a>
                                    <a href="/gender/{{$song->genero->slug}}" class="text-ellipsis text-xs text-muted">Genero {{$song->genero->name}}</a>
                                    <a href="/user/{{$song->artist->username}}" class="text-ellipsis text-xs text-muted">{{$song->artist->name}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </section>
                @endif
            </section>
        </section>
    </section>
</section>