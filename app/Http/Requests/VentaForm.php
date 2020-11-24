<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaForm extends FormRequest
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
            "cliente_id" => "required|exists:clientes,id",
            "detalle" => "required|array|min:1",
            "detalle.*.tipoServicio" => "required",
            "detalle.*.cantidad" => "required|integer|min:1",
            "detalle.*.valor" => "required|integer",
            "fecha_ingreso" => "required",
            "fecha_venta" => "sometimes",
            "tipo_descuento" => "sometimes",
            "descuento" => "sometimes",
            "forma_pago_id" => "sometimes",
            "folio" => "sometimes",
            "observaciones" => "sometimes",
        ];
    }
}
