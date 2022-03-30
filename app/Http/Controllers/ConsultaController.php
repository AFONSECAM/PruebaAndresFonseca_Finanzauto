<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Se llaman los modelos que se van a utilizar
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Transaccion;
use Alert;

class ConsultaController extends Controller
{
    public function index()
    {
        // Se crea una instancia del modelo Clientes y Cuentas
        $clientes = Cliente::all();  //Selecciona todos los registros que contiene la tabla Clientes
        $cuentas = Cuenta::all();      
        //Se retorna a una vista con las instancias creadas
        return view('transacciones.consulta', compact('clientes', 'cuentas'));  
    }
    //Funcion para obtener las cuentas asociadas al cliente
    public function byCliente($id){
        return Cuenta::where('cliente_id', $id)->get();
    }
    //Funcion para cosultar el saldo de la cuenta
    public function saldo(Request $request)
    {   
        //Validar los campos del form
        $validated = $request->validate([
            'cliente_id' => 'required',
            'cuenta_id' => 'required',
        ]);

        //Se crea una transaccion para obtener los datos de la relación de la cuenta
        $transaccion = new Transaccion([                        
            'cuenta_id'=> $request->get('cuenta_id')
        ]);  
        //Se captura el saldo de la cuenta con la funcion consultaSaldo del modelo
        $saldo = Cuenta::consultaSaldo($transaccion['cuenta_id']);  
        //Se obtiene la última transacción de la cuenta
        $ultima = $transaccion->cuenta->transacciones->max('id');
        //Mensaje emergente con la información consultada             
        Alert::info('Saldo actual', 'El saldo en la cuenta su cuenta es de: $' . number_format($saldo[0]['saldo'], 0) ."\n" .
                    ' Último movimiento: ' . strtoupper($transaccion->cuenta->transacciones[$ultima-1]['tipo']) ."\n" .
                    ' Valor: ' . $transaccion->cuenta->transacciones[$ultima-1]['valor'] ."\n" .
                    ' Fecha: ' . $transaccion->cuenta->transacciones[$ultima-1]['created_at']);
        return redirect('/home');        
    } 
}
