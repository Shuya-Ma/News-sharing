@extends('layouts.master')

@section('content')

<h1>{{ $task->title }}</h1>
@if(count($task->tagid)!=0)
<div>
	<label class="label label-primary">{{App\Tag::find($task->tagid)->tagname}}</label>
</div>
@endif
<p class="date sub-text" id="dt">on {{$task->updated_at}}</p>
<p class="lead">{{ $task->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back to all tasks</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['tasks.destroy', $task->id]
        ]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

    <div class="actionBox">
        {{ Form::open(array('url'=>'/postcomment', 'method' => 'post' , 'class' => 'form-inline' )) }}        
        <div class="form-group" style="width:100%; position:relative">                             
          {{ Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
      </div>
      <div class="form-group">                
          {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary' , 'style' => 'width:220px')) }}
      </div>
      {{ Form::close() }}         
	  </div>

    <a href="{{ route('comments.storecomment', $task->id) }}" class="btn btn-primary">Comment</a>
    </div>
</div>

@stop