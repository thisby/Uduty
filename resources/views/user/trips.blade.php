@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-9">
		@foreach($trips as $trip)
			<div class="well">		
				<span>{{$trip->getCountry()->getName()}}</span>
			</div>
		@endforeach
</div>
</div>
</div>
@endsection