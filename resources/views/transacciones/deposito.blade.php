@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Transacciones</li>
                <li class="breadcrumb-item active" aria-current="page">Deposito</li>
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

        <form action="{{ route('deposito.store') }}" method="POST">
            @csrf
            <div class="row">                
                <div class="col">
                    <div class="form-group">
                        <label for="cliente_id">Cliente asociado</label>
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
                <div class="col">
                    <div class="form-group">
                        <label for="cuenta_id">Cuenta asociada</label>
                        <select class="form-control" id="cuenta_id" name="cuenta_id">
                            <option value="">Seleccione una cuenta</option>                            
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                              <div class="input-group-text">$</div>
                            </div>
                            <input type="number" class="form-control" id="valor" placeholder="Monto a depositar" name="valor" value="{{ old('valor') }}">
                          </div>                    
                    </div>
                </div>
            </div>
            <div class="row text-center mt-5">
                <button type="submit" class="btn btn-primary">Realizar deposito</button>
            </div>
            <input type="text" name="tipo" id="tipo" value="deposito" hidden>
        </form>
    </div>

    <script>
        $(function(){
            $('#cliente_id').on('change', onChangeCliente);
        });

        function onChangeCliente(){
            var select_cliente = $(this).val()
            var html_select_cuentas = '<option value="">Seleccione una cuenta</option>';
            //AJAX
            $.get('/api/transacciones/'+select_cliente+'/deposito', function (data){
                for (var i = 0; i < data.length; i++) {                    
                    html_select_cuentas += '<option value="'+data[i].id+'">'+data[i].numero+'</option>';                    
                }                
                $('#cuenta_id').html(html_select_cuentas);
            });
            
        }
    </script>
@endsection
