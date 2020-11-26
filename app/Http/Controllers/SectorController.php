<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenericRequest;
use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Sectores";
        $items = Sector::all();
        $createRoute = route("sectores.create");
        $exportRoute = route("sectores.show", 0);
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
        $title = "Sectores";
        $submitRoute = route("sectores.store");
        $indexRoute = route("sectores.index");

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
        Sector::create($request->validated());

        return redirect()->route("sectores.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        $sectores = Sector::all();
        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "ID", "NOMBRE",
            "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($sectores as $sector) {
            fputcsv($csv, [
                $sector->id, $sector->nombre, $sector->created_at,
                $sector->updated_at
            ]);
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        $title = "Sectores";
        $item = $sector;
        $submitRoute = route("sectores.update", $sector);
        return view("control/generic/create-edit")
            ->with(compact("submitRoute", "title", "item"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(GenericRequest $request, Sector $sector)
    {
        $sector->update($request->validated());
        return redirect()->route("sectores.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route("sectores.index");
    }
}
