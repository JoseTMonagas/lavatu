<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $appends = ["editRoute", "deleteRoute"];

    protected $fillable = ["name"];

    public function getEditRouteAttribute()
    {
        return route('categories.edit', $this->id);
    }

    public function getDeleteRouteAttribute()
    {
        return route('categories.destroy', $this->id);
    }

    public function getNameAttribute(String $value)
    {
        return ucfirst(strtolower(str_replace("_", " ", $value)));
    }

    public function ropas()
    {
        return $this->hasMany('App\Ropa');
    }

}
