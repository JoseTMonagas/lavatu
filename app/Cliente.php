<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $appends = ["editRoute", "deleteRoute", "visitas", "ciclos", "monto"];
    protected $fillable = ["nombre", "telefono", "email",
                           "direccion", "fecha_nacimiento",
                           "cliente_frecuente"];

    public function getEditRouteAttribute()
    {
        return route("clientes.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("clientes.destroy", $this);
    }

    public function ventas()
    {
        return $this->hasMany("App\Venta");
    }

    public function getVisitasAttribute()
    {
        return $this->ventas->count();
    }

    public function getCiclosAttribute()
    {
        $ventas = $this->ventas;
        $acc = 0;
        foreach($ventas as $venta) {
            $servicios = $venta->tipoServicios;
            foreach($servicios as $servicio) {
                $acc += $servicio->pivot->cantidad;
            }
        }

        return $acc;
    }

    public function getMontoAttribute()
    {
        if ($this->ventas->count() > 0) {
            return $this->ventas->reduce(function($acc, $venta) {
                return $acc + $venta->total;
            });
        }
        return 0;
    }

}
