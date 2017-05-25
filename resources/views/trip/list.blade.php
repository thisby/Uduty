@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-9">
		@foreach($duties as $duty)
			<div class="well">		
				<span>{{$duty->getTitle()}}</span>
			</div>
		@endforeach
</div>
</div>
</div>
@endsection