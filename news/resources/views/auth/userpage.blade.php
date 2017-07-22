@extends('layouts.master')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <img src="\img\avatars\{{App\User::find($id)->avatar}}" style="width:120px;height:120px;">
    </div>
    <div class="col-sm-6">
      <h1>{{App\User::find($id)->name}}</h1>
      <p class="lead">{{App\User::find($id)->name}}'s homepage.</p>
    </div>
    <div clsas="col-sm-4">
      <br>
      <h4>Posts: {{ count($tasks) }}</h4>
      <h4>Comments: {{ count(App\Comment::where('userid', '=', $id)->get()) }}</h4>
    </div>
  </div>
  <hr>

  <!-- list of tasks -->
  <div class="row">
    @if(!empty($tasks))
    @foreach($tasks as $task)
    <div class="col-sm-4 story-grid">
      <a href="{{$task->url}}"><h3 class="story-grid-titles">{{ $task->title }}</h3></a>
      <div style="height: 30px">
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
        @include('partials.social', ['url' => $task->url])

      </div>
      <hr>
    </div>
    @endforeach
    @else
    <p>Nothing here.</p>
    @endif
  </div>
</div>

@stop