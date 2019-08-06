<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', '名前') !!}
			{!! Form::myInput('checkbox', 'status', '公開状態') !!}

		
		</div>  
	</div>
</div>
<div class="row mB-40">
	<div class="col-sm-12">
		{!! Form::myInput('text', 'name', '検索') !!}
	</div>
	<div class="col-sm-6">
		<div class="bgc-white p-20 bd">
			<div class="row">
				<div class="col-sm-6">
				<img src="{!! asset('images/amuro.jpeg') !!}" alt="..." class="img-thumbnail">
				</div>
				<div class="col-sm-6">
					利用件数  1000件
				</div>
			</div>
		</div>  
	</div>
	<div class="col-sm-6">
		<div class="bgc-white p-20 bd">
			<div class="row">
				<div class="col-sm-6">
				<img src="{!! asset('images/amuro.jpeg') !!}" alt="..." class="img-thumbnail">
				</div>
				<div class="col-sm-6">
					利用件数  1000件
				</div>
			</div>
		</div>  
	</div>
</div>