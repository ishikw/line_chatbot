@extends('admin.default')

@section('page-header')
	Event <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['EventController@store'],
			'files' => true
		])
	!!}

		@include('admin.event.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
