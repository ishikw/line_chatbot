<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', '名前',["required"=>true]) !!}

			{!! Form::myCheckbox('is_open', '公開状態',1,isset($item)?$item->is_open:"") !!}

		
		</div>  
	</div>
</div>
<div class="row mB-40">
	<div class="col-sm-12">
		{!! Form::myInput('text', 'search_text', '検索') !!}
	</div>
</div>
<div class="row mB-40 bot_template">
	@include("admin/bot/bottemplate")
</div>