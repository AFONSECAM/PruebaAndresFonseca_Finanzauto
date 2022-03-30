<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'cuenta_id' => 'required',
            'valor' => 'required|numeric',            
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => ":attribute",    
            'cuenta_id.required' => 'El número de cuenta es un campo requerido',
            'valor.required' => 'Debe ingresar un valor a depositar',
            'valor.numeric' => 'Solo se permiten valores numericos',
        ];
    }

    public function attributes()
    {
        return [
            'cliente_id' => 'Debe seleccionar un cliente',            
        ];
    }
}
