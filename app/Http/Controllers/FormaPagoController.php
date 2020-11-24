<?php

namespace App\Http\Controllers;

use App\FormaPago;
use App\Http\Requests\GenericRequest;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Formas de Pago";
        $items = FormaPago::all();
        $createRoute = route("forma-pagos.create");
        $exportRoute = route("forma-pagos.show", 0);
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
        $title = "Formas de Pago";
        $submitRoute = route("forma-pagos.store");
        $indexRoute = route("forma-pagos.index");

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
        FormaPago::create($request->validated());

        return redirect()->route("forma-pagos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function show($formaPago)
    {
        $formaPagos = FormaPago::all();
        $csv = fopen(storage_path("reporte-formas-pago.csv"), "w");

        fputcsv($csv, [
            "ID", "NOMBRE",
            "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($formaPagos as $formaPago) {
            fputcsv($csv, [
                $formaPago->id, $formaPago->nombre, $formaPago->created_at,
                $formaPago->updated_at
            ]);
        }

        return response()
            ->download(storage_path("reporte-formas-pago.csv"))
            ->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function edit(FormaPago $formaPago)
    {
        $title = "Formas de Pago";
        $item = $formaPago;
        $submitRoute = route("forma-pagos.update", $formaPago);
        return view("control/generic/create-edit")
            ->with(compact("submitRoute", "title", "item"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function update(GenericRequest $request, FormaPago $formaPago)
    {
        $formaPago->update($request->validated());
        return redirect()->route("forma-pagos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormaPago $formaPago)
    {
        $formaPago->delete();
        return redirect()->route("forma-pagos.index");
    }

}
