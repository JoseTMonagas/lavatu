<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenTrabajo extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cargas()
    {
        return $this->belongsToMany('App\Ropa')->withPivot(["cantidad"]);
    }

    public function getSubtotalPlanchadoAttribute()
    {
        $planchado = $this->cargas->filter(function($carga, $index) {
            return $carga->pivot->planchado;
        });

        $subtotal = 0;

        foreach($planchado as $carga) {
            $precio = 0;
            if ($carga->precio_planchado > 0) {
                $precio = $carga->precio_planchado;
            } else if ($carga->pivot->cantidad < 5) {
                $precio = 700;
            } else {
                $precio = 500;
            }

            $subtotal += $carga->cantidad * $precio;
        }

        return $subtotal;

    }

    public function getSubtotalCargasAttribute()
    {
        return $this->cargas->count() * env('APP_PRECIO_CARGAS', 8500);
    }

    public function getSubtotalDespachoAttribute()
    {
        return 0;
    }

    public function getTotalAttribute()
    {

        return $this->subtotalCargas + $this->subtotalPlanchado + $this->subtotalDespacho;
    }

    public function agregarCargas(Array $cargas)
    {
        foreach($cargas as $carga) {
            $this->cargas()->attach($carga["id"], ["cantidad" => $carga["cantidad"], "planchar" => $carga["planchar"]]);
        }
    }
}
