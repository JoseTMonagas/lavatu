<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuscriptorForm;

class SuscriptorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuscriptorForm $request)
    {
        \App\Suscriptor::create($request->validated());

        $status = [
            'title' => '¡Gracias!',
            'text' => 'Te has suscrito correctamente'
        ];

        return redirect()->route('home')->with(compact('status'));
    }

}
