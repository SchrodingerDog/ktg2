@extends('layouts.main')

@section('content')
{{ Form::open(array('action' => ['NewsController@update', $news->id], 'method' => 'put')) }}

	<div class="form-group
		@if ($errors->has('title'))
			has-error has-feedback
		@endif
	">
		{{ Form::label('title', 'Tytuł', $attributes = array('class'=>'control-label')) }}
		{{ Form::text('title', $value = $news->title, $attributes = array('class'=>'form-control')) }}
		@if ($errors->has('title'))
			@forelse ( $errors->get('title') as $message )
				<span class="help-block">{{ $message }}</span>
			@empty
			@endforelse
		@endif
	</div>

	<div class="form-group
		@if ($errors->has('body'))
			has-error has-feedback
		@endif
	">
		{{ Form::label('body', 'Treść', $attributes = array('class'=>'control-label')) }}
		{{ Form::textarea('body', $value = $news->body, $attributes = array('class'=>'form-control')) }}
		@if ($errors->has('body'))
			@forelse ( $errors->get('body') as $message )
				<span class="help-block">{{ $message }}</span>
			@empty
			@endforelse
		@endif
	</div>
	<div class="form-group">
		<a href="{{ URL::previous() }}" class="btn btn-info">Wróć</a>
		{{ Form::submit('Zapisz', $attributes=['class'=>'btn btn-info']) }}
	</div>


	
{{ Form::close() }}
@stop