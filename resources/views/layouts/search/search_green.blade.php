<form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" action="{{route('search')}}" method="POST">
@csrf
<div class="form-group">
    <div class="input-group">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
    </span>
    <input id="content" type="text" name="content" class="form-control input-sm no-border rounded" placeholder="Caniones, artistas...">
    </div>
</div>
</form>