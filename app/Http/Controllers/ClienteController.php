<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteForm;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("control/cliente/index")->with(compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submitRoute = route("clientes.store");
        $sectors = \App\Sector::all();

        return view("control/cliente/create-edit")->with(compact("submitRoute", "sectors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteForm $request)
    {
        Cliente::create($request->validated());

        return redirect()->route("clientes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        $clientes = Cliente::all();
        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "ID", "NOMBRE", "TELEFONO", "EMAIL", "DIRECCION", "SECTOR", "FECHA NACIMIENTO",
            "CLIENTE FRECUENTE", "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($clientes as $cliente) {
            $frecuente = ($cliente->cliente_frecuente) ? "SI" : "NO";
            fputcsv($csv, [
                $cliente->id, $cliente->nombre, $cliente->telefono,
                $cliente->email, $cliente->direccion, $cliente->sector->nombre, $cliente->fecha_nacimiento,
                $frecuente, $cliente->created_at, $cliente->updated_at,
            ]);
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $item = $cliente;
        $submitRoute = route("clientes.update", $cliente);
        $sectors = \App\Sector::all();

        return view("control/cliente/create-edit")
            ->with(compact("item", "submitRoute", "sectors"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteForm $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()->route("clientes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route("clientes.index");
    }

    /**
     * JSON list of all resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function jsonStore(ClienteForm $request)
    {
        $cliente = Cliente::create($request->validated());
        return response()->json($cliente);
    }
}
