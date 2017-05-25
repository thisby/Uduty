@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			@foreach($duties as $duty)
			<div class="well">
				<div class="media">
					<div class="media-left">
						<img src="/images/basket.png" class="media-object"/>		
					</div>
					<div class="media-body">
						<span class="media-heading">{{$duty->getTitle()}}</span>					
					</div>
				</div>

			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection