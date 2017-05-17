@extends('layouts.app')
@section('content')
<div class="container">
	{!!form_start($form)!!}
	<label for="countries">@lang('App.duty.countryAffected')</label>
	<select class="input-medium" id="country">
		@foreach($countries as $country)
		<option value="{{$country['id']}}">{{$country['name']}}</option>
		@endforeach
	</select>
	{--!!form_until($form, 'submit')!!--}
	{!!form_end($form, $renderRest = true)!!}
</div>
@endsection