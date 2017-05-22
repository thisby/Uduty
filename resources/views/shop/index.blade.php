@extends('layouts.app')
@section('content')
<div class="container">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="row">
		{!!form_start($form)!!}
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">		
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
					<tr data-id='{{$item->id}}'>
						<td>{{$item->name}}</td>
						<td><input type='text' value="{{$item->qty}}" class="quantity"/></td>
						<td>{{$item->price}}</td>
						<td>
							<span class="glyphicon glyphicon-remove remove" aria-hidden="true"></span>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ asset('js/jquery-ui.js') }}"></script>
	<script>

		$(function()
		{
			$(".quantity").spinner({min: 0});


			$(".quantity").on('change',function(){

				var id = $(this).closest('tr').attr('data-id');
		        var token = $('#token').val();
				$.post('{{Route("qty")}}',{'quantity':this.value,'id':id,'_token' : token},function(r)
				{
					alert(r);
				});
			})

			$(".remove").on('click',function(){
				if (confirm("@lang('App.shop.deleteConfirmation')"))
					$(this).closest('tr').remove();

			})		
		})


	</script>
	@endsection
