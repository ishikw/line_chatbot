@extends('admin.default')

@section('page-header')
    Bot <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.bot.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="row mB-40">
            <div class="col-sm-12">
                {!! Form::myInput('text', 'name', '検索') !!}
            </div>
            <div class="col-sm-6">
                <div class="bgc-white p-20 bd">
                    <div class="row">
                        <div class="col-sm-4">
                        <img src="{!! asset('images/amuro.jpeg') !!}" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-sm-4">
                            <img src="{!! asset('images/1.png') !!}" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route(ADMIN . '.bot.chat') }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-comment-alt"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                            <a href="{{ route(ADMIN . '.bot.edit',1) }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-marker-alt"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                            <a href="{{ route(ADMIN . '.bot.edit',1) }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-trash"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="bgc-white p-20 bd">
                    <div class="row">
                        <div class="col-sm-4">
                        <img src="{!! asset('images/amuro.jpeg') !!}" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-sm-4">
                            <img src="{!! asset('images/1.png') !!}" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route(ADMIN . '.bot.chat') }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-comment-alt"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                            <a href="{{ route(ADMIN . '.bot.edit',1) }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-marker-alt"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                            <a href="{{ route(ADMIN . '.bot.edit',1) }}">
                                <span class="icon-holder">
                                    <i class="c-purple-500  ti-trash"></i>
                                </span>
                                <!-- <span class="title">Shop</span> -->
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

@endsection