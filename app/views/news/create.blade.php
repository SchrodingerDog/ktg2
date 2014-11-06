@extends('layouts.main')

@section('content')
{{ Form::open(array('action' => 'NewsController@store')) }}

	<div class="form-group @if ($errors->has('title')) has-error has-feedback @endif">
		{{ Form::label('title', 'Tytuł', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('title', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->has('title'))
			@forelse ( $errors->get('title') as $message )
				<span class="help-block">{{ $message }}</span>
			@empty
			@endforelse
		@endif
	</div>

	<div class="form-group
		@if ($errors->has('body')) has-error has-feedback @endif">
		{{ Form::label('body', 'Treść', $attributes = array('class'=>'control-label')) }}
		{{ Form::textarea('body', $value = null, $attributes = array('class'=>'form-control')) }}
		@if ($errors->has('body'))
			@forelse ( $errors->get('body') as $message )
				<span class="help-block">{{ $message }}</span>
			@empty
			@endforelse
		@endif
	</div>
	<div class="form-group">
		{{ Form::submit('Dodaj', $attributes=['class'=>'btn btn-default']) }}
	</div>


	
{{ Form::close() }}
@stop