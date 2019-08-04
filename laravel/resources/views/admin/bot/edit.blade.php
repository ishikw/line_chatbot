@extends('admin.default')

@section('page-header')
	Bot <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['BotController@update', $item->id],
			'method' => 'put', 
			'files' => true
		])
	!!}

		@include('admin.bot.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
