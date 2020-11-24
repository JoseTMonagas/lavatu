<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocionForm extends FormRequest
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
            "nombre" => "required",
            "descripcion" => "required",
            "inicio" => "required|date",
            "fin" => "required|date",
            "img" => "sometimes|image",
            "dia_semana_id" => "required|array",
            "dia_semana_id.*" => "exists:dia_semanas,id",
        ];
    }
}
