<table>
	<div class="social-buttons">
		<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
			target="_blank"><i class="fa fa-facebook-official" style="font-size: 25px"></i>
		</a>
		<a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
			target="_blank"><i class="fa fa-twitter-square" style="font-size: 25px"></i>
		</a>
		<a href="https://plus.google.com/share?url={{ urlencode($url) }}"
			target="_blank"><i class="fa fa-google-plus-square" style="font-size: 25px"></i>
		</a>
		<a href="https://pinterest.com/pin/create/button/?{{http_build_query(['url' => $url,'description' => $task->description])}}" target="_blank"><i class="fa fa-pinterest-square" style="font-size: 25px"></i>
		</a>
	</div>
</table>