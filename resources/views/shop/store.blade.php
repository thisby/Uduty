@extends('layouts.app')
@section('content')
<div class="container">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="row">
		Felicitations! Nous avons bien enregistré vos souhaits.

	</div>
</div>
	@endsection
	@section('scripts')
	@endsection