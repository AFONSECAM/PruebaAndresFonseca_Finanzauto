@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-header">{{ __('Creación de cuentas') }}</div>
                    <div class="card-body">                                            
                        <p class="card-text">Permite crear cuentas de ahorro.</p>
                        <a href="{{ url('cuentas') }}" class="btn btn-light">Ir a crear</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">{{ __('Creación de una transacción') }}</div>
                    <div class="card-body">                                             
                        <p class="card-text">Permite hacer depositos o retiros de la cuenta.</p>
                        <a href="{{ url('deposito') }}" class="btn btn-dark">Deposito</a>
                        <a href="{{ url('retiro') }}" class="btn btn-info">Retiro</a>
                    </div>
                </div>                
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-dark">
                    <div class="card-header">{{ __('Consulta de saldo de una cuenta') }}</div>
                        <div class="card-body">                                               
                            <p class="card-text">Permite ver el saldo y movimientos.</p>
                            <a href="{{ url('consulta') }}" class="btn btn-light">Consultar saldo </a>
                        </div>
                    </div>
                </div>            
            </div> 
            
            {{-- Evalua si la variable recibida desde el controlador HomeController está vacío, si es así muestra mensaje para iniciar a crear una cuenta --}}
            @if ($cuentas->isEmpty()) 
                <div class="col-12 mt-5">  
                    <div class="alert alert-primary" role="alert">                                                                                     
                        No hay cuentas de ahorros creadas, para empezar da click <a href="{{ route('cuentas.index') }}" class="alert-link">aquí</a>.
                    </div>                                             
                </div>                     
            @endif  
        </div>
    </div>
@endsection
