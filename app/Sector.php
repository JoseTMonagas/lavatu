<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use SoftDeletes;

    protected $fillable = ["nombre"];
    protected $appends = ["editRoute", "deleteRoute"];

    public function getEditRouteAttribute()
    {
        return route("sectores.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("sectores.destroy", $this);
    }
}
