@extends('layouts.app')

@section('content')
<div class="container bg-primary bg-gradient">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-info text-black">Mis ordenes</div>

				<div class="card-body">
					@if(session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
					@endif

					@if($orders->count() == 0)
					<p>Aún no hay pedidos</p>
					<a href="{{route('user.order.create')}}" class="btn btn-success">Ordenar Pizza</a>
					@else

					<alert-order user_id="{{ auth()->user()->id }}"></alert-order>

					<div class="table table-responsive">
						<table class="table table-striped table-bordered table-hover bg-gradient table-bordered border-danger">
							<thead class="bg-warning">
								<tr>
									<th>ID</th>
									<th>Domicilio</th>
									<th>Tamaño</th>
									<th>Ingredientes</th>
									<th>Instrucciones</th>
									<th>Estatus</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
									<tr>
										<td> {{$order->id}} </td>
										<td> {{$order->address}} </td>
										<td> {{$order->size}} </td>
										<td> {{$order->toppings}} </td>
										<td> {{$order->instructions}} </td>
										<td><a href="{{route('user.order.show', $order)}}">{{$order->status->name}}</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection