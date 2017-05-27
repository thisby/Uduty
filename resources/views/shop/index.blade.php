@extends('layouts.app')
@section('content')
<div class="container">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="col-md-9">
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
							<td class="price">{{$item->price}}</td>
							<td class="subtotal">{{$item->subtotal}}</td>
							<td>
								<span class="glyphicon glyphicon-remove remove" aria-hidden="true"></span>
							</td>
						</tr>	
						@endforeach	
					</table>
				</div>
				{!!form_end($form, $renderRest = true)!!}
				<span id="total">@lang('App.total') : {{$total}}</span>
			</div>
		</div>
	</div>
	@unless(Auth::check())
	<div class="col-md-9">
		@include('auth.login')
	</div>
	@endunless
	@endsection
	@section('scripts')
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ asset('js/jquery-ui.js') }}"></script>
	<script>

	$(function()
	{

		function quantityChange (e,ui)
		{
			var id = $(this).closest('tr').attr('data-id');
			var token = $('#token').val();
			$.post('{{Route("qty")}}',{'quantity':this.value,'id':id,'_token' : token},function(r)
			{
				alert(r);
			});
		}

		$(".quantity").spinner({min: 0,change:function (e,ui)
			{
				var thus = this;
				var id = $(this).closest('tr').attr('data-id');
				var price = $(this).closest('tr').find('td.price').text();
				var subtotal = $(thus).closest('tr').find('td.subtotal');
				var qty = this.value;
				var token = $('#token').val();
				$.post('{{Route("qty")}}',{'quantity':qty,'id':id,'_token' : token},function(r)
				{
					$(subtotal).text(qty * price);
					$(".subtotal").each(function()
					{
						var total = 0;
						total += $(this).text();
						$("#total").text(total);						
					})
				});


			}});




		$(".remove").on('click',function(){
			if (confirm("@lang('App.shop.deleteConfirmation')"))
				$(this).closest('tr').remove();

		})		
	})


	</script>
	@endsection
