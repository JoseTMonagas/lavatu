<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteForm extends FormRequest
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
            'nombre' => "required",
            "telefono" => "required",
            "email" => "required|email:rfc",
            "direccion" => "required",
            "fecha_nacimiento" => "required",
            "cliente_frecuente" => "sometimes",
        ];
    }
}
