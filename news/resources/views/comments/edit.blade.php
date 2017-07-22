@extends('layouts.master')

@section('content')

<h1> Edit Comment </h1>
<p class="lead">Edit this comment below. <a href="{{ route('getcomments', $comment->storyid) }}">Go back to all comments.</a></p>
<hr>

<!-- messages -->
@include('partials.alerts.errors')

<!-- main form -->
{!! Form::model($comment, [
	'method' => 'PATCH',
	'route' => ['comments.update', $comment->id]
	]) !!}

	<div class="form-group">
		{!! Form::label('content', 'Comment:', ['class' => 'control-label']) !!}
		{!! Form::textarea('content', $comment->content, ['class' => 'form-control', 'rows' => '4']) !!}
	</div>

	{!! Form::submit('Update comment', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}


	@stop