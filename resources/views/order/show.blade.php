@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-info text-black">Rastreador de pedidos</div>

					<div class="card-body">
						@if(session('message'))
							<div class="alert alert-success">
								{{session('message')}}
							</div>
						@endif
						
						<progress-order status="{{ $order->status->name }}" initial="{{ $order->status->percent }}" order_id="{{$order->id}}"></progress-order>
						<alert-order user_id="{{ auth()->user()->id }}"></alert-order>

					<hr>

					
					<div class="order-details">
						<strong>Orden ID: </strong> {{$order->id}} <br>
						<strong>Tamaño: </strong>{{$order->size}} <br>
						<strong>Ingredientes: </strong>{{$order->toppings}} <br>
						@if($order->instructions != '')
						<strong>Instrucciones: </strong>{{$order->instructions}}
						@endif
					</div>

					<br>
					<a class="btn btn-primary" href="{{route('user.order')}}">Volver a Pedidos</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection