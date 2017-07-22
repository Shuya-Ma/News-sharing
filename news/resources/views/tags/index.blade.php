@extends('layouts.master')

@section('content')

<h1>Stories with tag &nbsp;<label class="label label-primary" style="font-size:20px">{{App\Tag::find($tagid)->tagname}}</label></h1>
<p class="lead">Found {{count($tasks)}} result(s). {{$tasks->name}}</p>
<hr>
<div class="container-fluid">
  <!-- list of tasks -->
  <div class="row">
    <p>where is the task?</p>
    @foreach($tasks as $task)
    <div class="col-sm-4 story-grid">
      <a href="{{$task->url}}"><h3 class="story-grid-titles">{{ $task->title }}</h3></a>
      <div style="margin-bottom:10px">
        <label class="label label-primary">{{App\Tag::find($tagid)->tagname}}</label>
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
        </table>
      </div>
      <hr>
    </div>
    @endforeach
  </div>
</div>

@stop