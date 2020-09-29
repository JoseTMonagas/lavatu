<?php

namespace App\Http\Controllers;

use App\User;
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
        $form = $request->validated();
        $user = User::find($request["user_id"]);
        $orden = $user->ordenes()->create();
        $orden->agregarCargas($request->validated());

        $status = [
            "status" => "OK",
            "redirect" => route('webpay.init', $orden),
        ];

        return response()->json($status);
    }
}
