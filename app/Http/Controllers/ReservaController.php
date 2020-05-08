<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return view("reservar-hora");
    }

    public function checkAvailable(Request $request)
    {
    }

    public function create(Request $request)
    {
    }
}
