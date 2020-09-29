<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenForm extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'carga' => 'required|array|min:1',
            'carga.*.cantidad' => 'required|integer',
            'carga.*.id' => 'required|integer',
            'carga.*.planchar' => 'required|boolean',
        ];
    }
}
