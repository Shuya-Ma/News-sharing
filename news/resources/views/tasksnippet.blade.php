@foreach($tasks as $task)
<div class="col-sm-4 story-grid tag-{{$task->tagid}}">
	<a href="{{route('getcomments', $task->id)}}"><h3 class="story-grid-titles">{{ $task->title }}</h3></a>
	<div style="height: 30px">
		@foreach ($task->tags as $tag)
		<label class="label label-default">{{$tag->tagname}}</label>
		@endforeach
	</div>
	<div style="height: 100px;">
		<p class="date sub-text" id="dt">on {{$task->updated_at}}</p>                    
		<p>{{ $task->description}}</p>
	</div>

	<table>
		<td>
			<!-- like feature -->
			@if(Auth::guest())

			<button type="button" class="btn btn-default glyphicon glyphicon-heart-empty" disabled>&nbsp;{{$task->likes->count()}}</button>
			@else

			@if (in_array(Auth::id(), $task->likes->pluck('userid')->toArray()))
			<!-- this user likes the post -->
			{{ Form::open(['route' => ['unlike', Auth::id(), $task->id]]) }}
			{{ Form::hidden('userid', Auth::id()) }}
			{{ Form::hidden('storyid', $task->id) }}
			<button type="submit" class="btn btn-default glyphicon glyphicon-heart">&nbsp;{{$task->likes->count()}}</button>
			{{ Form::close() }}

			@else
			<!-- this user hasnt liked the post -->
			{{ Form::open(['route' => 'likes.store']) }}
			{{ Form::hidden('userid', Auth::id()) }}
			{{ Form::hidden('storyid', $task->id) }}
			<button type="submit" class="btn btn-default glyphicon glyphicon-heart-empty">&nbsp;{{$task->likes->count()}}</button>
			{{ Form::close() }}
			@endif
			@endif
		</td>
		<td>
			<a href="{{ route('getcomments', $task->id) }}" class="btn btn-default">Comments</a>
		</td>
	</table>
	<br>
	<table>
		@include('partials.social', ['url' => $task->url])
		<div class="social-buttons">
			<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($task->url) }}"
				target="_blank"><i class="fa fa-facebook-official" style="font-size: 25px"></i>
			</a>
			<a href="https://twitter.com/intent/tweet?url={{ urlencode($task->url) }}"
				target="_blank"><i class="fa fa-twitter-square" style="font-size: 25px"></i>
			</a>
			<a href="https://plus.google.com/share?url={{ urlencode($task->url) }}"
				target="_blank"><i class="fa fa-google-plus-square" style="font-size: 25px"></i>
			</a>
			<a href="https://pinterest.com/pin/create/button/?{{
			http_build_query(['url' => $task->url,'description' => $task->description])}}" target="_blank"><i class="fa fa-pinterest-square" style="font-size: 25px"></i>
		</a>
	</div>
</table>
<!-- end share -->
<hr>
</div>
@endforeach