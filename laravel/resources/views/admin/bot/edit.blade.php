@extends('admin.default')

@section('page-header')
	Bot <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['BotController@update', $item->id],
			'method' => 'put', 
			'files' => true,
			"data-ajax-url" => url("api/bot")
		])
	!!}

		@include('admin.bot.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>
		
	{!! Form::close() !!}
<script>
	(function() {
	'use strict';
	window.addEventListener('load', function() {
		var form = document.getElementById('needs-validation');
		form.addEventListener('submit', function(event) {
			console.log("fire")
		if (form.checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
		}
		form.classList.add('was-validated');
		}, false);
	}, false);
	})();
</script>	
@stop
