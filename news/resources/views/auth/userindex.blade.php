@extends('layouts.master')

@section('content')

<h1>Search results for "{{$keyword}}"</h1>
<p class="lead">Found {{count($users)}} result(s).</p>
<hr>

<div class="container-fluid">
  <!-- list of users with summary -->
  <ul class="commentList">
    @if(!empty($users))
    @foreach($users as $user)
    <li>
    <div class="story-grid">
      <a href="{{route('users.show', $user->id)}}"><h3 class="story-grid-titles">{{ $user->name }}</h3></a>
      <div>
          <p>Posts: {{ count(App\Task::find($user->id)) }}</p>
          <p>Comments: {{ count(App\Comment::find($user->id)) }}</p>
      </div>
    </div>
    </li>
    @endforeach
    @endif
    </ul>
</div>

@stop