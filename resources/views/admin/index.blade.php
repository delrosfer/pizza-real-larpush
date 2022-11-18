@extends('layouts.app')

@section('content')
    <div class="container bg-primary bg-gradient">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-info text-black">Panel de Administración</div>

            <div class="card-body bg-light">
              @if (session('message'))
                  <div class="alert alert-success">
                    {{ session('message') }}
                  </div>
              @endif

              @if ($orders->count() == 0)
                  <p>Aún no hay ordenes</p>
                  <a href="{{ route('user.order.create') }}" class="btn btn-success">Ordenar Pizza</a>

                  @else
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover bg-gradient table-bordered border-danger">
                      <thead class="bg-warning">
                        <tr>
                          <th>ID</th>
                          <th>Nombre del cliente</th>
                          <th>Domicilio</th>
                          <th>Tamaño</th>
                          <th>Ingredientes</th>
                          <th>Instrucciones</th>
                          <th>Estatus</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                            <tr table-active>
                              <td>{{ $order->id }}</td>
                              <td>{{ $order->customer->name }}</td>
                              <td>{{ $order->address }}</td>
                              <td>{{ $order->size }}</td>
                              <td>{{ $order->toppings }}</td>
                              <td>{{ $order->instructions }}</td>
                              <td><a href="{{ route('admin.order.edit', $order) }}">{{ $order->status->name }}</a></td>
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