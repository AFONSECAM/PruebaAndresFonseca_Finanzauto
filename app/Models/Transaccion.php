<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'tipo', 'valor', 'cuenta_id'
    ];

    //Relación con la tabla cuentas
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
