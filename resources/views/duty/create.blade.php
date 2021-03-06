@extends('layouts.app')
@section('content')
<div class="container">
	{!!form_start($form)!!}
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	{!!form_until($form, 'Is_Free')!!}
	<div class="form-group">
		{!!form_label($form->UltimatumDate)!!}

		<div class='input-group date' id='UltimatumDateGroup'>
			{!!form_widget($form->UltimatumDate)!!}
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label for="countries">@lang('App.duty.countryAffected')</label>
		<select class="input-medium" id="country" name="Country">
			@foreach($countries as $country)
			<option value="{{$country['id']}}">{{$country['name']}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="objects">@lang('App.duty.objetReference')</label>
		<select class="input-medium" id="object" name="Item">
			@foreach($objects as $object)
			<option value="{{$object['id']}}">{{$object['name']}}</option>
			@endforeach
		</select>
	</div>

	{!!form_until($form, 'submit')!!}
	{!!form_end($form, $renderRest = false)!!}
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.min.js"></script>

<!--<script src='/js/jquery.datetimepicker.full.min.js'></script>-->

<script src="/js/moment-with-locales.min.js"></script>
<script src="/js/bootstrap-datetimepicker.min.js"></script>

<script>

$(function(){
	$("#UltimatumDateGroup").datetimepicker({format:'DD-MM-YYYY'});
})

</script>
@endsection