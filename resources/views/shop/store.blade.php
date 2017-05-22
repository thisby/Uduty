@extends('layouts.app')
@section('content')
<div class="container">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="row">


		{{ $shopLines }}

	</div>
</div>
	@endsection
	@section('scripts')
	@endsection