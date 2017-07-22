@extends('layouts.master')

@section('content')

<!-- <h1>{{ $task->title }}</h1> -->
<a href="{{$task->url}}"><h1 class="story-grid-titles">{{ $task->title }}</h1></a>

<p class="lead">{{ $task->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('home') }}" class="btn btn-default">Back to all tasks</a>
        <hr>

        <!-- list comments -->
        <div class="actionBox">
            <ul class="commentList">             
              @if (!empty($comments))
              @foreach ($comments as $cm)
              <div class="commentAnswerBox" style="background-color:#ade5f4"></div>
              <li>               
                <div class="commentText">                    
                    <p class="" >{{$cm->content}}</p> 
                    <div style="margin-top:10px">                    
                      <span class="date sub-text" id="dt">on {{$cm->updated_at}}</span>                    
                  </div>
              </div>
          </li>              
          @endforeach  
          @endif
      </ul>      
  </div>

  <!-- add comments -->
  @if (Auth::guest())

  @else
  <div>

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


</div>
@endif


</div>
</div>

@stop