<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenTrabajo extends Model
{
    use SoftDeletes;
    protected $fillable = ["cargas"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ropas()
    {
        return $this->belongsToMany('App\Ropa')->withPivot(["cantidad"]);
    }

    public function getSubtotalPlanchadoAttribute()
    {
        $planchado = $this->ropas()->where('planchar', true)->get();

        $subtotal = 0;

        foreach($planchado as $ropa) {
            $precio = 0;
            if ($ropa->precio_planchado > 0) {
                $precio = $ropa->precio_planchado;
            } else if ($ropa->pivot->cantidad < 5) {
                $precio = 700;
            } else {
                $precio = 500;
            }

            $subtotal += $ropa->pivot->cantidad * $precio;
        }

        return $subtotal;

    }

    public function getSubtotalCargasAttribute()
    {
        return $this->cargas * env('APP_PRECIO_ROPAS', 8700);
    }

    public function getSubtotalDespachoAttribute()
    {
        return 0;
    }

    public function getSubtotalAdicionalAttribute()
    {
        if ($this->ropas->count() > 0) {
            return $this->ropas->reduce(function ($acc, $ropa) {
                $price = isset($ropa->price) ? $ropa->price : 0;
                return $acc + $price;
            });
        }

        return 0;
    }

    public function getTotalAttribute()
    {

        return $this->subtotalCargas
            + $this->subtotalPlanchado
            + $this->subtotalDespacho
            + $this->subtotalAdicional;
    }

    public function agregarRopas(Array $ropas)
    {
        foreach($ropas["carga"] as $ropa) {
            $this->ropas()->attach($ropa["id"], ["cantidad" => $ropa["cantidad"], "planchar" => $ropa["planchar"]]);
        }
    }
}
