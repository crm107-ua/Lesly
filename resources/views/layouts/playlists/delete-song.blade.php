<form style="position:relative; bottom: 1px;" method="POST" action="/remove-from-playlist">
    @csrf

    <input id="playlist_slug" name="playlist_slug" type="hidden" value="{{$playlist->slug}}">

    <input id="song_id" name="song_id" type="hidden" value="{{$song->id}}">

    <button type="submit" style="background: none; border:none;">
        <i class="fa icon-trash text-danger"></i>
    </button>
</form>