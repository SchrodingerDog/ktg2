@extends('layouts.main')

@section('content')
{{ Form::open(array('action' => 'UsersController@update', 'method' => 'put', 'files'=>true)) }}

	<div class="form-group @if ($errors->first('email')) has-error has-feedback @endif">
        {{ Form::label('email', 'Email', $attributes = array('class'=>'control-label')) }}
		{{ Form::email('email', $value = $user->email, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('email'))
			<span class="help-block">{{ $errors->first('email') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('first_name')) has-error has-feedback @endif">
        {{ Form::label('first_name', 'Imię', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('first_name', $value = $user->first_name, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('first_name'))
			<span class="help-block">{{ $errors->first('first_name') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('last_name')) has-error has-feedback @endif">
        {{ Form::label('last_name', 'Nazwisko', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('last_name', $value = $user->last_name, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('last_name'))
			<span class="help-block">{{ $errors->first('last_name') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('password')) has-error has-feedback @endif">
		@if($user->picture)
			{{ HTML::image($user->picture, 'profile picture') }}
		@else
			{{ HTML::image('users/blank.jpg', 'profile picture', $attributes = array('class'=>'thumb', 'width' => 100, 'height'=>100)) }}
		@endif
		{{Form::file('picture', $attributes = array());}}
	</div>
	
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz</button>


	
{{ Form::close() }}
@stop