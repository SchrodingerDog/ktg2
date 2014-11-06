@extends('layouts.main')

@section('content')
	@if(Sentry::check())
			<p><a href="{{ URL::route('news.create') }}" class="btn btn-lg btn-info">Nowy</a></p>
	@endif

	@foreach ($news as $news)
	    	
	    	<div class="panel panel-primary">
				<div class="panel-heading">{{ $news->title }}</div>
				<div class="panel-body">{{ $news->body }}</div>
				<div class="panel-footer">
					<div class="text-right">{{ $news->created_at }}</div>
					@if(Sentry::check())
						<div class="text-left">
								<a href="{{ URL::route('news.edit', $news->id) }}" class="btn btn-info">Edytuj</a>
								<a href="{{ URL::route('news.delete', $news->id) }}" class="btn btn-info">Usuń</a>
						</div>
					@endif
				</div>
			</div>
			
		@endforeach
@stop