<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenTrabajoEditForm extends FormRequest
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
            'state' => 'required|alpha',
            'cargas' => 'required|integer',
            'planchas' => 'required|integer',
            'observacion' => 'sometimes',
            'ropas' => 'required|array|min:1',
            'ropas.*.ropa_id' => 'required|exists:ropas,id',
            'ropas.*.cantidad' => 'required|integer',
            'ropas.*.planchar' => 'required|boolean',
        ];
    }
}
