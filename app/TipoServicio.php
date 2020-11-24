<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoServicio extends Model
{
    use SoftDeletes;

    protected $fillable = ["nombre"];
    protected $appends = ["editRoute", "deleteRoute", "precio"];

    public function getEditRouteAttribute()
    {
        return route("tipo-servicios.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("tipo-servicios.destroy", $this);
    }

    public function precios()
    {
        return $this->hasMany("App\Precio");
    }

    public function getPrecioAttribute()
        {
            $date = date("Y-m-d");
            $precio = $this->precios()->where([
                ["desde", "<=", $date],
                ["hasta", ">=", $date]
            ])->latest()->first();

            return $precio->precio ?? 0;
        }
}
