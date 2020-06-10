<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaForm;
use Illuminate\Http\Request;
use App\Mail\ReservaRealizada;
use App\Mail\ReservaAdmin;
use App\ReservaHora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{

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
        $email = $request->validated()['email'];
        $user = \App\User::where('email', $email)->first();

        try {
            Mail::to($email)->send(new ReservaRealizada($reserva->hora));
            Mail::to('reservas@lavatu.cl')->send(new ReservaAdmin($user, $reserva));
        } catch(\Exception $e) {
        }

        return response()->json($reserva);

    }
}
