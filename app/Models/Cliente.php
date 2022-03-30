<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $table = 'clientes';
    
    //Relación con la tabla cuentas
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
