@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-info text-black">Ordenar Pizza</div>

				<div class="card-body bg-orange">
					@if(session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
					@endif

					<div class="row">
						<div class="col-lg-12">
							<form method="POST" action=" {{route('user.order.store')}} " class="form-horizontal">
								{{csrf_field()}}

								<div class="form-group">
									<label class="col-sm-8 control-label"><strong>Domicilio</strong></label>
									<div class="col-sm-10">
										<input type="text" name="address" placeholder="Ingrese su Domicilio" class="form-control" autofocus>
									</div>
								</div>
								<hr>
								<div class="form-group bg-warning">
									<label class="col-sm-8 control-label"><strong>Tamaño</strong></label>
									<div class="col-sm-10">
										<div>
											<label><input type="radio" checked="" name="size" value="Mediana" id="medium"> Mediana </label>
										</div>
										<div>
											<label><input type="radio" name="size" value="Grande" id="large"> Grande </label>
										</div>
										<div>
											<label><input type="radio" name="size" value="Extra-grande" id="extra-large"> Extra Grande </label>
										</div>
									</div>
								</div>

								<div class="hr-line-dashed"></div>
								<hr>
								<div class="for-group">
									<label class="col-sm-8 control-label"><strong>Ingredientes</strong></label>
									<div class="col-sm-10">
										<label class="checkbox-inline">
											<input type="checkbox" name="toppings[]" value="Pepperoni" id="pepperoni"> Pepperoni
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="toppings[]" value="Extra-queso" id="extra-cheese"> Extra Queso
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="toppings[]" value="Champiñones" id="mushrooms"> Champiñones
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="toppings[]" value="Carne molida" id="ground-beef"> Carne Molida
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" name="toppings[]" value="Piña" id="pineapple"> Piña
										</label>
									</div>
								</div>

								<div class="hr-line-dashed"></div>
								<div class="hr-line-dashed"></div>
								<hr>
								<div class="form-group bg-warning">
									<label class="col-sm-8 control-label"><strong>Instrucciones</strong></label>
									<div class="col-sm-10">
										<input type="text" name="instructions" placeholder="Colocar Instrucciones Especiales aquí" class="form-control">
									</div>
								</div>

								<div class="hr-line-dashed"></div>
								<br>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<button class="btn btn-success" type="submit">Ordenar ahora</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection