<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaForm;
use App\TipoServicio;
use App\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        $ventas->load("cliente");
        return view("control/venta/index")->with(compact("ventas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = \App\TipoServicio::all();
        $formasPago = \App\FormaPago::all();

        return view("control/venta/create-edit")
            ->with(compact("servicios", "formasPago"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaForm $request)
    {
        $form = $request->validated();
        $detalles = $form["detalle"];

        $venta = Venta::create($form);
        foreach ($detalles as $detalle) {
            $venta->tipoServicios()
                ->attach($detalle["tipoServicio"]["id"], [
                    "precio_unitario" => $detalle["tipoServicio"]["precio"],
                    "cantidad" => $detalle["cantidad"],
                    "valor" => $detalle["valor"],
                ]);
        }

        return response()->json("OK");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view("control/venta/show")->with(compact("venta"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $servicios = \App\TipoServicio::all();
        $formasPago = \App\FormaPago::all();
        $venta->load("cliente", "formaPago", "tipoServicios");

        return view("control/venta/create-edit")
            ->with(compact("servicios", "formasPago", "venta"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(VentaForm $request, Venta $venta)
    {
        $form = $request->validated();
        $detalles = collect($form["detalle"])->mapWithKeys(function ($detalle) {
            return [$detalle["tipoServicio"]["id"] => [
                "cantidad" => $detalle["cantidad"],
                "valor" => $detalle["valor"],
                "precio_unitario" => $detalle["tipoServicio"]["precio"],
                
            ]];
        });

        $venta->update($form);

        $venta->tipoServicios()->sync($detalles);


        return response()->json("OK");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route("ventas.index");
    }

    public function export(Request $request)
    {
        $inicio = $request->desde;

        $ventas = Venta::where([
            ['fecha_ingreso', '>=', $inicio],
        ])
                ->get()
                ->load("tipoServicios", "cliente");

        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "FECHA", "FOLIO", "CLIENTE", "FORMA DE PAGO",
            "SERVICIO", "DESCUENTO", 
            "CANTIDAD", "VALOR",
        ]);

        foreach ($ventas as $venta) {

            $descuento = $venta->valorDescuento
                       / $venta->tipoServicios->count();

            foreach ($venta->tipoServicios as $servicio) {

                fputcsv($csv, [
                    $venta->fecha_ingreso, $venta->folio ?? "",
                    $venta->cliente()->first()->nombre,
                    $venta->formaPago->nombre ?? "",
                    $servicio->nombre,
                    $descuento,
                    $servicio->pivot->cantidad,
                    $servicio->pivot->valor
                ]);
            }
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }
}
