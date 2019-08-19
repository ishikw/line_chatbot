<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', '名前') !!}
			{!! Form::myCheckbox('is_open', '公開状態',1,$item->is_openr) !!}

		
		</div>  
	</div>
</div>
<div class="row mB-40">
	<div class="col-sm-12">
		{!! Form::myInput('text', 'search_text', '検索') !!}
	</div>
	@foreach ($bot_templates as $bot_template)
	<div class="col-sm-6">
		<div class="bgc-white p-20 bd">
			<div class="row">
				<div class="col-sm-6">
				<img src="{!! $bot_template->image_url !!}" alt="..." class="img-thumbnail">
				</div>
				<div class="col-sm-6">
					{!! $bot_template->name !!}
					利用件数  {!! $bot_template->bot_count() !!} 件
				</div>
			</div>
		</div>  
	</div>
	@endforeach
</div>