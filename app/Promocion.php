<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "nombre", "descripcion", "img",
        "inicio", "fin"
    ];

    protected $appends = ["editRoute", "deleteRoute"];

    protected $hidden = [
        'img'
    ];

    public static function getPromocionesDia()
    {
        $hoy = date("Y-m-d");
        $dia = date("N") + 1;

        $promociones = Promocion::where([
            ['inicio', '<=', $hoy],
            ['fin', '>=', $hoy]
        ])
                     ->whereHas('diasSemana', function($query) use ($dia) {
                         $query->where('id', 1)
                             ->orWhere('id', $dia);
                     })
                     ->get();

        return $promociones;
    }

    public function getEditRouteAttribute()
    {
        return route("promocions.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("promocions.destroy", $this);
    }

    public function diasSemana()
    {
        return $this->belongsToMany("App\DiaSemana");
    }

}
