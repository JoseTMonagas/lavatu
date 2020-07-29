<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CondicionController extends Controller
{
    public function viewEs()
    {
        return view('condiciones-es');
    }

    public function viewEn()
    {
        return view('condiciones-en');
    }
}
