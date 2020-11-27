<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenTrabajoEditForm;
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($ordenTrabajo)
    {
        $ordenTrabajo = OrdenTrabajo::find($ordenTrabajo);
        $ordenTrabajo->load("user");
        return view("control/ot/edit")->with(compact("ordenTrabajo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(OrdenTrabajoEditForm $request, $ordenTrabajo)
    {
        $ordenTrabajo = OrdenTrabajo::find($ordenTrabajo);
        $ordenTrabajo->update($request->validated());

        return response()->json($ordenTrabajo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $ordenTrabajo)
    {
        //
    }
}
