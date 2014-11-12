@extends('layouts.main')

@section('content')
	{{Form::open(['route'=>'user.loginPOST']);}}
	<div class="form-group @if ($errors->first('email')) has-error has-feedback @endif">
        {{ Form::label('email', 'Email', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('email', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('email'))
			<span class="help-block">{{ $errors->first('email') }}</span>
		@endif
	</div>

	<div class="form-group @if ($errors->first('password')) has-error has-feedback @endif">
        {{ Form::label('password', 'Hasło', $attributes = array('class'=>'control-label')) }}
		{{ Form::password('password', $attributes = array('class'=>'form-control')) }}
		@if ($errors->first('password'))
			<span class="help-block">{{ $errors->first('password') }}</span>
		@endif
	</div>
	<div class="checkbox">
		<label>
		  <input type="checkbox" name ="remember"> Remember me
		</label>
	</div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    {{Form::close();}}
@stop