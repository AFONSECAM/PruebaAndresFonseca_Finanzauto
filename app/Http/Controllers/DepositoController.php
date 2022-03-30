<?php

namespace App\Http\Controllers;
//Se llaman los modelos que se van a utilizar
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaccionRequest;
use Alert;

class DepositoController extends Controller
{
    public function index()
    {
        // Se crea una instancia del modelo Clientes y Cuentas
        $clientes = Cliente::all();   //Selecciona todos los registros que contiene la tabla Clientes 
        $cuentas = Cuenta::all();     //Selecciona todos los registros que contiene la tabla Cuentas  
        return view('transacciones.deposito', compact('clientes', 'cuentas'));  
    }
    //Funcion para obtener las cuentas asociadas al cliente
    public function byCliente($id){
        return Cuenta::where('cliente_id', $id)->get();
    }
    /*
        Funcion para almacenar en la BD
        Se usa el request StoreTransaccionRequest para realizar la validación de datos del formulario
    */
    public function store(StoreTransaccionRequest $request)
    {   
        /*
            Se crea una variable para almacenar los datos que se obtienen del form por el $request            
            se hace llamado al metodo create de Transaccion 
        */              
        $deposito = Transaccion::create($request->all());  
        //Mediante el método estático de Cuenta se realiza la actualización en la BD
        Cuenta::depositoSaldo($deposito['cuenta_id'], $deposito['valor']);
        //Mensaje y retorno a vista                
        Alert::success('Felicidades', 'Ha realizado un deposito por valor de $' . number_format($deposito['valor'], 0) . ' en la cuenta de ahorros # '. $deposito->cuenta->numero);
        return redirect('/home');        
    } 
}
