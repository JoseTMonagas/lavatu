<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ropa extends Model
{
    use SoftDeletes;

    protected $appends = ["editRoute", "deleteRoute"];

    protected $fillable = ["name", "img", "price", "category_id"];

    public function getEditRouteAttribute()
    {
        return route('ropas.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('ropas.destroy', $this->id);
    }

    public function getNameAttribute(String $value)
    {
        return ucfirst(strtolower(str_replace("_", " ", $value)));
    }

    public function getImgAttribute(String $value)
    {
        return asset($value);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function ordenes()
    {
        return $this->belongsToMany('App\OrdenTrabajo')->withPivot(["cantidad", "planchar"]);
    }

}
