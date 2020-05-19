<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaForm;
use Illuminate\Http\Request;
use App\Mail\ReservaRealizada;
use App\ReservaHora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("reservar-hora");
    }

    public function checkAvailable(Request $request)
    {
        $datetime = Carbon::createFromFormat('Y-m-d H:i', $request->input('datetime'));
        $reservas = ReservaHora::whereDate('hora', $datetime->format('Y-m-d'))->whereTime('hora', '>=', $datetime->subMinutes(45)->format("H:i:s"))->whereTime('hora', '<=', $datetime->addMinutes(45)->format("H:i:s"))->get();
        $response = false;
        if ($reservas->count() <= 3) {
            $response = true;
        }

        return response()->json($response);
    }

    public function create(ReservaForm $request)
    {
        $reserva = ReservaHora::create($request->validated());

        Mail::to($request->user())->send(new ReservaRealizada($reserva->hora));

        return response()->json($reserva);

    }
}
