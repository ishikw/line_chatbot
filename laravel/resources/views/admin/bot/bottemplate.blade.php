@foreach ($bot_templates as $bot_template)
<div class="col-sm-6">
    <div class="bgc-white p-20 bd">
        <div class="row">
            <div class="col-sm-2">
                {!! Form::Radio('template_id',$bot_template->id, isset($item)?$item->template_id:"") !!}

            </div>
            <div class="col-sm-5">
                <img src="{!! $bot_template->image_url !!}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-sm-5">
                {!! $bot_template->name !!}
                利用件数  {!! $bot_template->bot_count() !!} 件
            </div>
        </div>
    </div>  
</div>
@endforeach