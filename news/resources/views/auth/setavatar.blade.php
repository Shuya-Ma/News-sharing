@extends('layouts.master')

@section('content')

<h1> Set Avatar </h1>
<p class="lead">View/Choose your avatar below. </p>
<hr>

<!-- messages -->
@include('partials.alerts.errors')

<div class="center">
	<p>{{$avatar}}</p>
	<img class="img-responsive" src="/img/avatars/{{ $avatar }}" style="width:300px;height:300px;">
</div>
<hr>
<!-- choose preset avatars -->
<button 
type="button" 
class="btn btn-default btn-lg" 
data-toggle="modal" 
data-target="#chooseAvatarModal">
Choose avatar
</button>

<div class="modal fade" id="chooseAvatarModal" 
tabindex="-1" role="dialog" 
area-labelledby="chooseAvatarModalLabel">
<div class="modal-dialog" role="document">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" 
			data-dismiss="modal" 
			aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" 
			id="chooseAvatarModalLabel">Choose from available avatars</h4>
		</div>
		{!! Form::open(
		array(
		'route' => 'setpresetavatar', 
		'class' => 'form')) !!}
		<div class="modal-body">
			<!-- shows predefined avatars -->
			<!-- Icon made by Freepik (http://www.flaticon.com/authors/freepik) from www.flaticon.com  -->
			<div class="row">
				<div class="col-sm-3">
					<label>
						<input type="radio" name="preset" value="cat.png" />
						<img src="/img/avatars/cat.png" style="width:120px;height:120px;">
					</label>
				</div>
				<div class="col-sm-3">
					<label>
						<input type="radio" name="preset" value="dog.png" />
						<img src="/img/avatars/dog.png" style="width:120px;height:120px;">
					</label>
				</div>
				<div class="col-sm-3">
					<label>
						<input type="radio" name="preset" value="pig.png" />
						<img src="/img/avatars/pig.png" style="width:120px;height:120px;">
					</label>
				</div>
				<div class="col-sm-3">
					<label>
						<input type="radio" name="preset" value="hippopotamus.png" />
						<img src="/img/avatars/hippopotamus.png" style="width:120px;height:120px;">
					</label>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" 
			class="btn btn-default" 
			data-dismiss="modal">Close</button>
			<span class="pull-right">
				<button type="submit" class="btn btn-primary">
					Set Avatar
				</button>
			</span>
		</div>

		{!! Form::close() !!}
	</div>
</div>
</div>

<hr>
<p style="padding-top: 20px">OR</p>
<hr>
<!-- file upload form -->

{!! Form::open(
	array(
	'route' => 'users.store', 
	'class' => 'form', 
	'files' => true)) !!}


	<div class="form-group">
		{!! Form::label('Upload New Image') !!}
		{!! Form::file('image', null) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Set Avatar', ['class' => 'btn btn-default', 'style' => 'font-size:18px']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop