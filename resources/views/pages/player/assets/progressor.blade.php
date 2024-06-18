<script>
	var waveform = document.querySelector('#waveform');
	var waveformHover = document.querySelector('#waveform_hover');
	var audio = document.querySelector('audio');
	var time = document.querySelector('#time');
	var play_b = document.querySelector('#play_b');

	var json = '[26,20,16,16,14,18,14,18,15,38,39,30,40,41,35,35,40,38,30,42,36,37,33,28,30,32,35,33,43,36,36,39,36,29,43,32,39,25,22,21,23,24,19,17,22,21,20,17,29,24,23,30,41,32,33,35,38,39,28,35,37,37,40,36,37,33,33,32,32,30,33,30,37,37,33,35,38,35,35,31,35,35,29,26,31,30,27,30,28,30,30,27,27,37,43,35,39,36,40,35,38,41,45,37,40,34,42,39,41,39,30,37,43,35,39,47,32,33,37,34,36,36,41,40,38,38,34,34,32,35,39,40,36,38,35,37,38,32,33,32,27,30,26,32,34,29,40,36,30,38,32,38,40,34,35,37,32,36,50,39,29,34,35,38,35,40,43,38,35,41,37,36,36,35,31,30,34,23,21,34,32,26,31,35,31,25,27,34,28,32,29,29,30,28,42,36,36,31,35,38,31,31,36,34,29,32,37,28,32,29,28,29,29,31,36,29,28,34,34,29,49,29,38,25,29,26,29,36,41,40,33,38,48,50,29,27,37,38,35,45,27,32,45,31,28,41,39,39,32,36,41,42,32,32,33,37,36,48,28,40,38,27,33,37,38,32,31,35,26,29,35,34,25,32,17,18,29,16,22,14,19,18,15,13,18,59]';

	var p = new Progressor({
		media: audio,
		bar: waveform,
		time: time,
	});

	function get_png(json) {
		json = JSON.parse(json);

		var height = 60;
		var width = 858;

		var c = document.createElement("canvas");
		c.width = width;
		c.height = height;
		var ctx = c.getContext("2d");

		function getGraph(fillStyle1, fillStyle2, fillStyle3) {

			if (fillStyle3) {
				var grd = ctx.createLinearGradient(0, 120, 0, 0);
				grd.addColorStop(0.5, fillStyle1);
				grd.addColorStop(1, fillStyle2);
				fillStyle1 = grd;
				fillStyle2 = fillStyle3;
			}

			json.forEach(function(item, i, arr) {
				ctx.fillStyle = fillStyle1;
				ctx.fillRect(i * 3, height, 2, item - height);
				ctx.fillStyle = fillStyle2;

				var next = json[i + 1];

				if (item <= next) {
					h2 = next;
				} else {
					h2 = item;
				}

				ctx.fillRect(i * 3 + 2, height, 1, h2 - height);

			});

			return c.toDataURL();
		}

		waveform.style.width = width + 'px';
		waveform.style.height = height + 'px';
		waveform.style.backgroundImage = 'url(' + getGraph("#909090", "#d3d3d3") + ')';

		waveformHover.style.height = height + 'px';
		waveformHover.style.backgroundImage = 'url(' + getGraph("purple", "purple", "white") + ')';
	}

	get_png(json);

	play_b.onclick = function() {

		if (this.classList.toggle('play_i')) {
			audio.pause();
			return
		}
		audio.play();
	}
</script>