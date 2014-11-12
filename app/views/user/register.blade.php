@extends('layouts.main')

@section('content')
	{{Form::open(['route'=>'user.registerPOST', 'files' => true]);}}
	<div class="form-group @if ($errors->first('email')) has-error has-feedback @endif">
        {{ Form::label('email', 'Email', $attributes = array('class'=>'control-label')) }}
		{{ Form::email('email', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('email'))
			<span class="help-block">{{ $errors->first('email') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('first_name')) has-error has-feedback @endif">
        {{ Form::label('first_name', 'Imię', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('first_name', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('first_name'))
			<span class="help-block">{{ $errors->first('first_name') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('last_name')) has-error has-feedback @endif">
        {{ Form::label('last_name', 'Nazwisko', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('last_name', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('last_name'))
			<span class="help-block">{{ $errors->first('last_name') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('password')) has-error has-feedback @endif">
        {{ Form::label('password', 'Hasło', $attributes = array('class'=>'control-label')) }}
		{{ Form::password('password', $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('password'))
			<span class="help-block">{{ $errors->first('password') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('password')) has-error has-feedback @endif">
		{{Form::file('picture', $attributes = array());}}
	</div>
	
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zarejestruj</button>
    {{Form::close();}}
@stop