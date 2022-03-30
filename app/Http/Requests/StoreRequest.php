<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'numero' => 'required|numeric|unique:cuentas',
            'cliente_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'numero.required' => 'El número de cuenta es un campo requerido',
            'numero.unique' => 'El número de cuenta ya existe',
            'cliente_id.required' => 'Debe seleccionar un cliente para asociar la cuenta',
        ];
    }
}
