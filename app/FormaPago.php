<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use SoftDeletes;

    protected $fillable = ["nombre"];
    protected $appends = ["editRoute", "deleteRoute"];

    public function getEditRouteAttribute()
    {
        return route("forma-pagos.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("forma-pagos.destroy", $this);
    }
}
