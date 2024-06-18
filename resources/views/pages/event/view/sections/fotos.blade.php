<div class="panel panel-default">
    <div class="panel-heading">Galería</div>
    <div class="panel-body">
        <article class="media">
            <a class="pull-left thumb-md m-md">
                <img style="border-radius: 5px;" onclick="myFunction(this);" src="{{$event->image}}" />
            </a>
            @if($event->image2)
            <a class="pull-left thumb-md m-md">
                <img style="border-radius: 5px;" onclick="myFunction(this);" src="{{$event->image2}}" />
            </a>
            @endif
            @if($event->image3)
            <a class="pull-left thumb-md m-md">
                <img style="border-radius: 5px;" onclick="myFunction(this);" src="{{$event->image3}}" />
            </a>
            @endif
            @if($event->image4)
            <a class="pull-left thumb-md m-md">
                <img style="border-radius: 5px;" onclick="myFunction(this);" src="{{$event->image4}}" />
            </a>
            @endif
        </article>
    </div>
</div>

<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }

    window.onload = function() {
        var img = new Image();
        img.src = "<?php echo $event->image ?>";
        myFunction(img);
    };
</script>