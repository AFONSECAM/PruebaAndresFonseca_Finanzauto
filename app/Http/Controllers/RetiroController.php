<?php

namespace App\Http\Controllers;
//Se llaman los modelos que se van a utilizar
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaccionRequest;
use Alert;

class RetiroController extends Controller
{
    public function index()
    {
        // Se crea una instancia del modelo Clientes y Cuentas
        $clientes = Cliente::all();   //Selecciona todos los registros que contiene la tabla Clientes 
        $cuentas = Cuenta::all();     //Selecciona todos los registros que contiene la tabla Cuentas   
        return view('transacciones.retiro', compact('clientes', 'cuentas'));  
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
        $retiro = Transaccion::create($request->all());                
       /*
            Si el método retiraSaldo() que evalua el saldo disónible es true permite hacer el retiro, 
            si no arroja mensaje de error
       */
        if(Cuenta::retiraSaldo($retiro['cuenta_id'], $retiro['valor'])){            
            Alert::success('Felicidades', 'Ha realizado un retiro por valor de ' . number_format($retiro['valor'], 0) . ' en la cuenta de ahorros # '. $retiro->cuenta->numero);
            return redirect('/home');        
        }else{
            Alert::error('Fondos Insuficientes', 'El retiro por valor de ' . number_format($retiro['valor'], 0) . ' en la cuenta de ahorros # '. $retiro->cuenta->numero . ' no se pudo realizar.');
            return redirect('/home');        
        }         
    } 
}
