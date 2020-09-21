<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenForm;
use Illuminate\Http\Request;

class GuardarOTController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(OrdenForm $request)
    {
        $orden = \Auth::user()->ordenes()->create();
        $orden->agregarCargas($request->validated());

        $status = [
            "status" => "OK",
            "redirect" => route('webpay.init', $orden),
        ];

        return response()->json($status);
    }
}
