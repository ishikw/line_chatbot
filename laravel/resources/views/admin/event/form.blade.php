<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'イベント名') !!}
			{!! Form::myDateRange('date',"期間") !!}
			{!! Form::myFile('avatar', '画像') !!}
			{!! Form::myTextArea('bio', '内容') !!}
		</div>  
	</div>
</div>