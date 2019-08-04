@extends('admin.default')

@section('page-header')
	Bot <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['BotController@store'],
			'files' => true
		])
	!!}

		@include('admin.bot.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
