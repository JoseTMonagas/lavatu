<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenericRequest;
use App\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tipos de Servicio";
        $items = TipoServicio::all();
        $createRoute = route("tipo-servicios.create");
        $exportRoute = route("tipo-servicios.show", 0);
        return view("control/generic/index")
            ->with(compact("items", "title", "createRoute", "exportRoute"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tipos de Servicio";
        $submitRoute = route("tipo-servicios.store");
        $indexRoute = route("tipo-servicios.index");

        return view("control/generic/create-edit")
            ->with(compact("submitRoute", "title", "indexRoute"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericRequest $request)
    {
        TipoServicio::create($request->validated());

        return redirect()->route("tipo-servicios.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function show($tipoServicio)
    {
        $tipoServicios = TipoServicio::all();
        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "ID", "NOMBRE",
            "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($tipoServicios as $tipoServicio) {
            fputcsv($csv, [
                $tipoServicio->id, $tipoServicio->nombre, $tipoServicio->created_at,
                $tipoServicio->updated_at
            ]);
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServicio $tipoServicio)
    {
        $title = "Tipos de Servicio";
        $item = $tipoServicio;
        $submitRoute = route("tipo-servicios.update", $tipoServicio);
        return view("control/generic/create-edit")
            ->with(compact("submitRoute", "title", "item"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(GenericRequest $request, TipoServicio $tipoServicio)
    {
        $tipoServicio->update($request->validated());
        return redirect()->route("tipo-servicios.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServicio $tipoServicio)
    {
        $tipoServicio->delete();
        return redirect()->route("tipo-servicios.index");
    }
}
