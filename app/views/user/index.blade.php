@extends('layouts.main')

@section('content')

@foreach ($users as $u)
	@if($u->picture)
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
			<div class="item">
				{{ HTML::image($u->picture, 'profile picture') }}
				<p>{{$u->first_name}} {{$u->last_name}}</p>
			</div>
		@else
			{{ HTML::image('users/blank.jpg', 'profile picture', $attributes = array('class'=>'thumb', 'width' => 100, 'height'=>100)) }}
		@endif	
@endforeach

@stop

@section('add-js')
	<script type="text/javascript">
	    var $container = $('.container');
		// initialize
		$container.masonry({
			gutter: 10,
			itemSelector: '.item'
		});
	</script>
@stop