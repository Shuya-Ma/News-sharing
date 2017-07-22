@extends('layouts.master')

@section('content')

<h1>Add a New Story</h1>
<hr>

<!-- check if input is valid -->
@include('partials.alerts.errors')

<!-- main form -->
{!! Form::open([
    'route' => 'tasks.store'
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

{{ Form::hidden('id', Auth::id()) }}

{!! Form::submit('Add New Story', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}

@section('footer')
	<script>
		$('#tag_list').select2({
			placeholder: 'Click to choose tags'
		});
	</script>
@endsection

@stop