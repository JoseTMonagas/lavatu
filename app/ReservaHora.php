<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ReservaHora extends Model
{
    protected $fillable = ['hora', 'carga', 'tipo_carga'];

    public function setHoraAttribute($value)
    {
        $this->attributes['hora'] = Carbon::createFromFormat('Y-m-d H:i', $value);
    }
}
