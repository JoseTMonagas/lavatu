<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Precio extends Model
{
    use SoftDeletes;
    protected $fillable = ["tipo_servicio_id", "precio", "desde", "hasta"];
    protected $appends = ["editRoute", "deleteRoute"];

    public function getEditRouteAttribute()
    {
        return route("precios.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("precios.destroy", $this);
    }

    public function tipoServicio()
    {
        return $this->belongsTo("App\TipoServicio");
    }
}
