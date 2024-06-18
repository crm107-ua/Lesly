@if($playlist->user->id==Auth::user()->id)
<a href="/mod-playlist/{{$playlist->slug}}" class="btn btn-s-md btn-default m-t-md" style="margin-bottom:10px; margin-left: 15px;">Editar playlist</a>
@else
@if($playlist->followers()->find(Auth::user()->id)==null)
<form role="search" action="{{route('follow-playlist')}}" method="POST">
    @csrf
    <input name="id" value="{{$playlist->id}}" hidden></input>
    <button type="submit" class="btn btn-s-md btn-success m-md">Seguir playlist</button>
</form>
@else
<form role="search" action="{{route('unfollow-playlist')}}" method="POST">
    @csrf
    <input name="id" value="{{$playlist->id}}" hidden></input>
    <button type="submit" class="btn btn-s-md btn-default m-md" style="margin-bottom:10px; margin-left: 15px;">Dejar de seguir</a></button>
</form>
@endif
@endif
<a href="https://www.facebook.com/sharer.php?u={{URL::current()}}" rel="me" title="Facebook" class="btn btn-s-md btn-primary m-t-md" style="margin-bottom:10px; margin-left: 15px;"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
<a href="https://twitter.com/share?url={{$playlist->name}}&text={{URL::current()}}" rel="me" title="Twitter" class="btn btn-s-md btn-info m-t-md" style="margin-bottom:10px; margin-left: 15px;"><i class="fa fa-fw fa-twitter"></i> Twitter</a>