<?php

namespace App\Http\Controllers;
//Se llaman los modelos que se van a utilizar
use App\Models\Cuenta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Alert;

class CuentaController extends Controller
{
    public function index()
    {
        // Se crea una instancia del modelo Clientes
        $clientes = Cliente::all();   
        //Se retorna a una vista con la instancia creada     
        return view('cuentas.create', compact('clientes'));  
    }

    public function store(StoreRequest $request)
    {   
        /*
            Se crea una variable para almacenar los datos que se obtienen del form por el $request            
            se hace llamado al metodo create de Cuenta 
        */
        $cuentaN = Cuenta::create($request->all()); 
        
        /*
            Se evalua con la relación cuenta-cliente si el cliente tiene nombres o si tiene razón social
        */
        if($cuentaN->cliente->nombres != null){
            Alert::success('Felicidades', 'Ha creado la cuenta de ahorros # '. $cuentaN['numero'] .' para el cliente ' . $cuentaN->cliente->nombres . " " . $cuentaN->cliente->apellidos);
            return redirect('/home');
        }else{
            Alert::success('Felicidades', 'Ha creado la cuenta de ahorros # '. $cuentaN['numero'] .' para el cliente ' . $cuentaN->cliente->rs);
            return redirect('/home');
        }        
    }   
}
