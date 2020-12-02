<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromocionForm;
use App\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promociones = Promocion::all();

        return view("control/promocion/index")
            ->with(compact("promociones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dias = \App\DiaSemana::all();
        $submitRoute = route("promocions.store");

        return view("control/promocion/create-edit")
            ->with(compact("dias", "submitRoute"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromocionForm $request)
    {
        $form = $request->validated();
        $file = $request->file("img");
        $contents = $file->openFile()->fread($file->getSize());
        $form["img"] = $contents;

        $promocion = Promocion::create($form);
        $promocion->diasSemana()->attach($form["dia_semana_id"]);

        return redirect()->route("promocions.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show($promocion)
    {
        $promos = Promocion::all();
        $csv = fopen(storage_path("reporte.csv"), "w");

        fputcsv($csv, [
            "ID", "NOMBRE", "DESCRIPCION", "INICIO", "FIN",
            "FECHA CREACION", "FECHA ACTUALIZACION",
        ]);

        foreach($promos as $promo) {
            fputcsv($csv, [
                $promo->id, $promo->nombre, $promo->descripcion,
                $promo->inicio, $promo->fin, $promo->created_at,
                $promo->updated_at,
            ]);
        }

        return response()
            ->download(storage_path("reporte.csv"))
            ->deleteFileAfterSend();
    }

    public function showImg($promocion)
    {
        $promocion = Promocion::find($promocion);

        return response()->make($promocion->img, 200, [
            "Content-Type" => (new \finfo(FILEINFO_MIME))->buffer($promocion->img)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocion $promocion)
    {
        $dias = \App\DiaSemana::all();
        $submitRoute = route("promocions.update", $promocion);

        return view("control/promocion/create-edit")
            ->with(compact("dias", "submitRoute", "promocion"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(PromocionForm $request, Promocion $promocion)
    {
        $form = $request->validated();
        if ($request->hasFile("img")) {
            $file = $request->file("img");
            $contents = $file->openFile()->fread($file->getSize());
            $form["img"] = $contents;
        } else {
            $form["img"] = $promocion->img;
        }

        $promocion->update($form);
        $promocion->diasSemana()->sync($form["dia_semana_id"]);

        return redirect()->route("promocions.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        $promocion->delete();

        return redirect()->route("promocions.index");
    }
}
