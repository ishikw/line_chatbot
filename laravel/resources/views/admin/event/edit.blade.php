@extends('admin.default')

@section('page-header')
	Event <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['EventController@update', $item->id],
			'method' => 'put', 
			'files' => true
		])
	!!}

		@include('admin.event.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
