@extends('layouts.master')

@section('content')

<label style="font-size: 14px; color:#636b6f">&nbsp;|&nbsp;</label>
@foreach (App\Tag::all() as $tag)
<a href="{{route('filterbytag', $tag->id)}}">
	<label style="font-size: 12px">{{$tag->tagname}}</label>
</a>
<label>&nbsp;|&nbsp;</label>
@endforeach

<a href="{{url('/')}}">
	<label style="font-size: 12px; color:gray">x Clear</label>
</a>
<label style="font-size: 14px; color:#636b6f">&nbsp;|&nbsp;</label>

<h1>stories</h1>
<p class="lead">View all posts. <a href="{{ route('tasks.create') }}">Add a new one?</a></p>
<hr>

<div clsas="container-fluid">
	<div class="row">
		<!-- list of tasks -->
		@each('partials.taskthumbnail', $tasks, 'task')
		
</div>
</div>
</div>
@stop