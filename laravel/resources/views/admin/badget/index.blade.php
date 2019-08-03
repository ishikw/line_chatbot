@extends('admin.default')

@section('page-header')
    Badget <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')



    {!! Form::model($badget, [
            'action' => ['BadgetController@index'],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    <div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::myInput('text', 'badget', '今月予算') !!}
        <button type="submit" class="btn btn-primary">{{ trans('app.update_item') }}</button>
            </div>  
        </div>
    </div>
    {!! Form::close() !!}

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">予算履歴</h6>
                <div class="mT-30">
                <canvas id="line-chart" height="220"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-bordered thead-dark" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>予定</th>
                    <th>実績</th>
                    <th>消化率</th>
                    <th>詳細</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($badgets as $badget)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.users.edit', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.users.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.users.destroy', $item->id), 
                                        'method' => 'DELETE',
                                        ]) 
                                    !!}

                                        <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                        
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>


@endsection