<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenTrabajoEditForm;
use App\OrdenTrabajo;
use Illuminate\Http\Request;

use PDF;

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
    public function show($ordenTrabajo)
    {
        $ordenTrabajo = OrdenTrabajo::find($ordenTrabajo);
        $ordenTrabajo->load("user", "ropas");

        $title = date("dmY")
               . "_"
               . $ordenTrabajo->user->name
               . $ordenTrabajo->user->surname
               . "_"
               . "OP"
               . "_"
               . $ordenTrabajo->id;

        PDF::SetTitle($title);
        PDF::AddPage();
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(185, 0,  "Lavatu - " . date("d/m/Y"), "B", 0, "C");
        PDF::Ln(10);
        PDF::Cell(20, 0, "Nombre:", "LT");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(165, 0,
                  $ordenTrabajo->user->name
                  . " "
                  . $ordenTrabajo->user->surname,
                  "TR", 1);
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(20, 0, "Correo:", "LT");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(80, 0, $ordenTrabajo->user->email, "T");
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(15, 0, "Fono:", "LT");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(70, 0, $ordenTrabajo->user->phone, "TR", 1);
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(20, 0, "Direccion:", "LTB");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(80, 0, $ordenTrabajo->user->address, "TB");
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(15, 0, "Sector:", "LTB");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(70, 0, $ordenTrabajo->user->sector, "TRB", 1);
        PDF::Ln(10);

        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(120, 0, "Item", "LTB");
        PDF::Cell(35, 0, "Cantidad", "LTB");
        PDF::Cell(30, 0, "Planchado", "LTBR", 1);

        PDF::SetFont('helvetica', '', 12);
        foreach ($ordenTrabajo->ropas as $ropa) {
            $planchado = ($ropa->pivot->planchado) ? "Si" : "No";
            PDF::Cell(120, 0, $ropa->name, "LB");
            PDF::Cell(35, 0, $ropa->pivot->cantidad, "LB");
            PDF::Cell(30, 0, $planchado, "LBR", 1);
        }

        PDF::Ln(10);

        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(140, 0, "Subtotal Cargas:", 0, 0, "R");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(45, 0, $ordenTrabajo->subtotalCargas, 0, 1);
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(140, 0, "Subtotal Planchado:", 0, 0, "R");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(45, 0, $ordenTrabajo->subtotalPlanchado, 0, 1);
        PDF::SetFont('helvetica', 'B', 12);
        PDF::Cell(140, 0, "Total:", 0, 0, "R");
        PDF::SetFont('helvetica', '', 12);
        PDF::Cell(45, 0, $ordenTrabajo->total, 0, 1);


        PDF::Output($title . ".pdf");

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
        $ordenTrabajo->load("user", "ropas");
        $ropas = \App\Ropa::all();
        return view("control/ot/edit")->with(compact("ordenTrabajo", "ropas"));
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
        $form = $request->validated();
        $ordenTrabajo = OrdenTrabajo::find($ordenTrabajo);
        $ordenTrabajo->update($form);

        $ropas = collect($form["ropas"])->mapWithKeys(function ($detalle) {
            return [$detalle["ropa_id"] => [
                "cantidad" => $detalle["cantidad"],
                "planchar" => $detalle["planchar"],
            ]];
        });

        $ordenTrabajo->ropas()->sync($ropas);

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
