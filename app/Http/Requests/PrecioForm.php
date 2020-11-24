<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecioForm extends FormRequest
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
            "tipo_servicio_id" => "required|exists:tipo_servicios,id",
            "precio" => "required|integer|gt:0",
            "desde" => "required|date",
            "hasta" => "required|date",
        ];
    }
}
