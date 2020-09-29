<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearOTController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = \Auth::user();
        $items = \App\Category::all();
        $items->load('ropas');

        return view('generar_ot')->with(compact('items', 'user'));
    }
}
