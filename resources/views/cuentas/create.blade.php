@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Cuentas</li>
                <li class="breadcrumb-item active" aria-current="page">Crear cuenta</li>
            </ol>
        </nav>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ups!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>                                                
            </div>            
        @endif   
                                    
        <form action="{{ route('cuentas.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="numero">Número de cuenta</label>
                        <input type="text" class="form-control" id="numero" name="numero" aria-describedby="numero" value="{{ old('numero') }}">
                        <small id="numero" class="form-text text-muted">Recuerde solo compartir este número con el
                            cliente.</small>
                    </div>
                </div>
                <input type="hidden" name="saldo" value="0">
                <div class="col">
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" id="cliente_id" name="cliente_id">
                            <option value="">Seleccione un cliente</option>                            
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}> 
                                    @if ($cliente->nombres == null)
                                        {{ $cliente->rs}}
                                    @else
                                        {{ $cliente->nombres . " " . $cliente->apellidos }} 
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>                                
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
            </div>
        </form>
    </div>
@endsection
