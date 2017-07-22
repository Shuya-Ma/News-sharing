@extends('layouts.master')

@section('content')

<h1>Edit Post: {{$task->title}}</h1>
<p class="lead">Edit this post below. <a href="{{ route('tasks.index') }}">Go back to post manager.</a></p>
<hr>

<!-- messages -->
@include('partials.alerts.errors')

<!-- main form -->
{!! Form::model($task, [
    'method' => 'PATCH',
    'route' => ['tasks.update', $task->id]
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 150, 'rows' => 5]) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Link:', ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tag_list', 'Tags:') !!}
	{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

{!! Form::submit('Update Story', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@section('footer')
	<script>
		$('#tag_list').select2({
			placeholder: 'Click to choose tags'
		});
	</script>
@endsection

@stop