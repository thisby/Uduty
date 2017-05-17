@extends('layouts.app')
@section('content')
<div class="container">
	{!!form_start($form)!!}
	{!!form_row($form->contenu)!!}

	<select class="input-medium bfh-countries" data-country="@lang('Default.lang')" id="continent">
		@foreach($countries as $country)
		<option value="{{$country['id']}}">{{$country['name']}}</option>
		@endforeach
	</select>
	{!!form_end($form, $renderRest = true)!!}
</div>
@endsection