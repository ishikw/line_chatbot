@extends('admin.default')

@section('page-header')
	store <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['StoreController@update',$store->id],
			'files' => true,
            'method' => 'put',
		])
	!!}

    <div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::myInput('text', 'name', '店舗名',[],Input::old("name",$store->name)) !!}
                {!! Form::myInput('text', 'zip', '郵便番号',[],Input::old("zip",$store->zip)) !!}
                {!! Form::myInput('text', 'address', '住所',[],Input::old("address",$store->address)) !!}
                {!! Form::myInput('text', 'phone', '電話番号',[],Input::old("phone",$store->phone)) !!}
                {!! Form::myInput('email', 'email', 'メールアドレス',[],Input::old("email",$store->email)) !!}
            </div>  
        </div>
    </div>
		<button type="submit" class="btn btn-primary">{{ trans('app.update_item') }}</button>
		
	{!! Form::close() !!}
	
@stop
