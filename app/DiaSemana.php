<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaSemana extends Model
{
    use SoftDeletes;
    protected $fillable = ["nombre"];

    public function promociones()
    {
        return $this->belongsToMany("App\Promocion");
    }
}
