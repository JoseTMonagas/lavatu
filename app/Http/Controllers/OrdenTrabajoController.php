<?php

namespace App\Http\Controllers;

use App\OrdenTrabajo;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("control/ot/index");
    }

    public function list()
    {
        $ordenes = OrdenTrabajo::all();
        $ordenes->load("user");

        return response()->json($ordenes);
    }

    public function updateState(Request $request)
    {
        $orden = OrdenTrabajo::find($request->orden_trabajo_id);
        $orden->state = $request->estado;
        $orden->save();

        return response()->json($orden);
    }


}
