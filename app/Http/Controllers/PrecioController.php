<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrecioForm;
use App\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::all();
        $precios->load("tipoServicio");

        return view("control/precio/index")
            ->with(compact("precios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = \App\TipoServicio::all();
        $submitRoute = route("precios.store");

        return view("control/precio/create-edit")
            ->with(compact("servicios", "submitRoute"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrecioForm $request)
    {
        Precio::create($request->validated());

        return redirect()->route("precios.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show($precio)
    {
        $precios = Precio::all();
        $precios->load("tipoServicio");
        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "ID", "TIPO SERVICIO", "PRECIO", "DESDE", "HASTA",
            "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($precios as $precio) {
            fputcsv($csv, [
                $precio->id, $precio->tipoServicio->nombre,
                $precio->precio, $precio->desde, $precio->hasta,
                $precio->created_at, $precio->updated_at,
            ]);
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        $servicios = \App\TipoServicio::all();
        $submitRoute = route("precios.update", $precio);

        return view("control/precio/create-edit")
            ->with(compact("servicios", "submitRoute", "precio"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(PrecioForm $request, Precio $precio)
    {
        $precio->update($request->validated());

        return redirect()->route("precios.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
        $precio->delete();

        return redirect()->route("precios.index");
    }
}
