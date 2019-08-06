@extends('admin.default')

@section('page-header')
	Shop <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['UserController@store'],
			'files' => true
		])
	!!}

    <div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::myInput('text', 'name', '店舗名') !!}
                {!! Form::myInput('text', 'name', '郵便番号') !!}
                {!! Form::myInput('text', 'name', '住所') !!}
                {!! Form::myInput('text', 'name', '電話番号') !!}
                {!! Form::myInput('email', 'email', 'メールアドレス') !!}
        
            </div>  
        </div>
    </div>
		<button type="submit" class="btn btn-primary">{{ trans('app.update_item') }}</button>
		
	{!! Form::close() !!}
	
@stop
