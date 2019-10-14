@extends('admin.default')

@section('page-header')
	Bot <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['BotController@store'],
			'files' => true,
			"data-ajax-url" => url("api/bot"),
			"id" =>"needs-validation",
			"novalidate"
		])
	!!}

		@include('admin.bot.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}
<script>
                      // Example starter JavaScript for disabling form submissions if there are invalid fields
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