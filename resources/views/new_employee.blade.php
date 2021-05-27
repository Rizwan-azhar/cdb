@extends('layout.app')

<style>
    .form-inline-custom{
        display: flex !important;
    align-items: flex-end !important;
    align-content: center;
    }
    .form-inline-custom label{
        width: 35% !important;
    }
    select{
	   color: #495057 !important
   }
   .btn-grabar{
	   background-color: #9B75A6 !important;
	color: #fff !important;
	padding: 10px 15px !important;
    font-size: 16px !important;
   }
</style>
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
              <div class="card-body">
								<h6 class="card-title">Crear trabajador</h6>
								<form class="forms-sample">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Apellidos</label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputEmail1">Nombre</label>
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Direccion</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Privincia</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
									
                                   
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">E-mail</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Numero de cuenta</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Tipo de cuenta</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Banco</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil de emergencia</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
									<div class="div-btns text-center">
                                  
                                    <button class="btn btn-grabar">GRABAR</button>
                                    </div>
								</form>
              </div>
            </div>
        </div>
    </div>
@endsection
