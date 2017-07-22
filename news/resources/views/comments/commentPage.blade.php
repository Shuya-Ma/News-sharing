@extends('layouts.master')

@section('content')

<!-- the CSS styles for this page is inspired by Ravindu Jayalath's blog post -->
<!-- at http://awithit.blogspot.com/2014/09/how-to-create-simple-comment-box-in.html -->

<a href="{{$task->url}}"><h1 class="story-grid-titles">{{ $task->title }}</h1></a>

<div style="margin-bottom:10px">
    @foreach (($task->tags) as $tag)
    <label class="label label-default">{{$tag->tagname}}</label>
    @endforeach
</div>
<p class="date sub-text" id="dt">on {{$task->updated_at}}</p>                    
<p class="lead">{{ $task->description }}</p>

<hr>
@include('partials.social', ['url' => ($task->url)])
<hr>

<div class="row">
    <div class="col-md-6">
        <h4 style="color:gray; text-decoration:underline">Comments</h4>
        @if (count($comments)!=0)
        <div class="actionBox">
            <ul class="commentList">             
                @foreach ($comments as $cm)
                <div class="commentAnswerBox" style="background-color:#ade5f4"></div>
                <li style="width: 500px">
                    <table>
                        <td id="userCommentThumbnail">
                            <a href="{{route('users.show', $cm->userid)}}">
                                <img src="/img/avatars/{{ (App\User::find($cm->userid))->avatar }}" style="width:40px;height:40px;margin-top:10px">
                                <p>{{ App\User::find($cm->userid)->name }}</p>
                            </a>
                        </td>
                        <td style="width: 100%; padding-left: 20px">
                            <div class="commentText">                    
                                <p>{{$cm->content}}</p> 
                                <div style="margin-top:10px">                    
                                    <p class="date sub-text" id="dt">on {{$cm->updated_at}}</p>                    
                                </div> 
                            </div>
                        </td>
                    </table>
                    @if (Auth::id()==$cm->userid)
                    <div>
                        <table>
                            <td>
                                {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['comments.destroy', $cm->id]
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{ route('comments.edit', $cm->id) }}" class="btn btn-default">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                            </td>
                        </table>

                    </div>
                    @endif
                    
                </li>              
                @endforeach  
            </ul>      
        </div>
        @else
        <div style="padding-left: 20px">
            <p>This post has no comments yet.</p>
        </div>
        @endif

        @unless (Auth::guest())
        <div>
            <div class="actionBox">
                {{ Form::open(array('url'=>'/postcomment', 'method' => 'post' , 'class' => 'form-inline' )) }}        
                <div class="form-group" style="width:100%; position:relative">                             
                    {{ Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                </div>
                {{ Form::hidden('storyid', $task->id) }}
                <div class="form-group">                
                    {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary' , 'style' => 'width:220px')) }}
                </div>
                {{ Form::close() }}         
            </div>
            @include('partials.alerts.errors')

        </div>
        @endunless

    </div>
</div>

@stop