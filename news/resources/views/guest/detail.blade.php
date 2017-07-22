@extends('layouts.master')

@section('content')

<h1>{{ $task->title }} hi guest</h1>
<p class="lead">{{ $task->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back to all tasks</a>
        <hr>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Comment</a>

        <!-- main form -->
        {!! Form::open([
        'route' => 'pages.storeComment'
        ]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('url', 'Link:', ['class' => 'control-label']) !!}
            {!! Form::text('url', null, ['class' => 'form-control']) !!}
        </div>

        {{ Form::hidden('id', Auth::id()) }}

        {!! Form::submit('Add New Story', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>

@stop