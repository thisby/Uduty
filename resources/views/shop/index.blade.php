@extends('layouts.app')
@section('content')
<div class="container">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="row">
		{!!form_start($form)!!}
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th>Nom</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($items as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->qty}}</td>
						<td>{{$item->price}}</td>
						<td>
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
						</td>
					</tr>	
					@endforeach		
				</table>
			</div>
		{!!form_end($form, $renderRest = true)!!}
		</div>
	</div>
	@endsection
	@section('scripts')
	@endsection