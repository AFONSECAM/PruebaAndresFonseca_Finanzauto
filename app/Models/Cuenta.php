<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cuenta extends Model
{
    use HasFactory;
    
    protected $table = 'cuentas';

    protected $fillable = [
        'numero', 
        'saldo', 
        'cliente_id'
    ];

    //Relación con la tabla clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    //Relación con la tabla transacciones
    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    //Método estático para realizar el depósito de saldo en la cuenta
    public static function depositoSaldo($id, $monto){
        //Se obtiene la cuenta
        $cuenta = Cuenta::where('id', $id);
        //Se obtiene el saldo de la cuenta
        $saldo_actual = $cuenta->get('saldo');        
        //Se suma el depósito al saldo actual de la cuenta
        $nuevo_saldo = $saldo_actual[0]['saldo'] + $monto;
        //Se realiza la actualización del campo saldo en la BD
        $cuenta->update(['saldo' => $nuevo_saldo, 'updated_at' => Carbon::now()]);
    }

    //Método estático para realizar un retiro de saldo de la cuenta
    public static function retiraSaldo($id, $monto){
        //Se obtiene la cuenta
        $cuenta = Cuenta::where('id', $id);
        //Se obtiene el saldo de la cuenta
        $saldo_actual = $cuenta->get('saldo');        
        //Evalua si el saldo actual es mayor al monto a retirar
        if($saldo_actual[0]['saldo'] >= $monto){
            //Disminuye el monto a retirar del saldo de la cuenta
            $nuevo_saldo = $saldo_actual[0]['saldo'] - $monto;   
            //Se realiza la actualización del campo saldo en la BD         
            $cuenta->update(['saldo' => $nuevo_saldo, 'updated_at' => Carbon::now()]);
            return true;
        }else{
            return false;
        }
    }

    //Método estático para consultar el saldo de la cuenta
    public static function consultaSaldo($id){
        //Se obtiene la cuenta
        $cuenta = Cuenta::where('id', $id);
        //Se obtiene el saldo de la cuenta
        $saldo_actual = $cuenta->get('saldo');
        //Se retorna el saldo para utilizar en la vista
        return $saldo_actual;
    }


}
