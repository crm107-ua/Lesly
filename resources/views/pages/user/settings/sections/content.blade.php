<aside class="bg-white">
    <section class="vbox">
        <header class="header bg-light lt">
            <ul class="nav nav-tabs nav-white">
                <li class="active"><a href="#general" data-toggle="tab">Configuración general</a></li>
                <li class=""><a href="#playlists" data-toggle="tab">Playlists</a></li>
                @if(Auth::user()->artist)
                <li class=""><a href="#canciones" data-toggle="tab">Canciones</a></li>
                <li class=""><a href="#albums" data-toggle="tab">Álbums</a></li>
                <li class=""><a href="#eventos" data-toggle="tab">Eventos</a></li>
                @endif
            </ul>
        </header>
        <section class="scrollable">
            <div class="tab-content">
                @include('pages.user.settings.sections.general.index')
                @include('pages.user.settings.sections.playlists.index')
                @if(Auth::user()->artist)
                @include('pages.user.settings.sections.songs.index')
                @include('pages.user.settings.sections.albums.index')
                @include('pages.user.settings.sections.events.index')
                @endif
            </div>
        </section>
    </section>
</aside>

<style>
    button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }
</style>