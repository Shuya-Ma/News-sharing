@extends('layouts.master')

@section('content')

<h1>{{Auth::user()->name}}'s stories {{count($tasks)}}</h1>
<p class="lead">Manage your posts here. <a href="{{ route('tasks.create') }}">Add a new one?</a></p>
<hr>

<div class="container-fluid">
	<!-- list of tasks -->
	<div class="row">
		@foreach($tasks as $task)
		<div class="col-sm-4 story-grid">
			<a href="{{$task->url}}"><h3 class="story-grid-titles">{{ $task->title }}</h3></a>
			<div style="height:30px">
				@foreach ($task->tags as $tag)
				<label class="label label-default">{{$tag->tagname}}</label>
				@endforeach
			</div>
			<div style="height: 100px;">
				<p>{{ $task->description}}</p>
			</div>
			<div>
				<table>
					<td>
						<a href="{{ route('getcomments', $task->id) }}" class="btn btn-default">Comments</a>
					</td>
					<td>
						<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Story</a>
					</td>
					<td>
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['tasks.destroy', $task->id]
						]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</table>
			</div>
			<hr>
		</div>
		@endforeach
	</div>
</div>

@stop