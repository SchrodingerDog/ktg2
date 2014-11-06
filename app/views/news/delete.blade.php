@extends('layouts.main')

@section('content')
	<div class="jumbotron">
		<h2>Czy jesteś pewien, że chcesz usunąć news?</h2>
	  	<i><p>"{{$news->title}}</p>
	  	<p>{{$news->body}}"</p></i>
		{{ Form::open(array('action' => ['NewsController@destroy', $news->id], 'method' => 'delete')) }}
			<a href="{{ URL::previous() }}" class="btn btn-info">Wróć</a>
			{{ Form::submit('Usuń', $attributes=['class'=>'btn btn-danger']) }}
		{{ Form::close() }}
	</div>
@stop