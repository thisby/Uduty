@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-9">
		@foreach($trips as $trip)
			<div class="well">		
				<p class="pull-right">{{$trip->getCountry()->getName()}}</p>
				<p>@php echo $trip->getDepartureDate()->format('d-m-Y') @endphp</p>
				<p>@php echo $trip->getEndDate()->format('d-m-Y') @endphp</p>				
			</div>
		@endforeach
</div>
</div>
</div>
@endsection