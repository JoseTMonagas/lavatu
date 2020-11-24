<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $appends = [
        "editRoute", "deleteRoute",
        "showRoute", "total"
    ];
    protected $fillable = [
        "fecha_ingreso", "fecha_venta", "cliente_id",
        "forma_pago_id", "folio", "promocion_id",
        "descuento", "tipo_descuento", "observaciones"
    ];

    public function getEditRouteAttribute()
    {
        return route("ventas.edit", $this);
    }

    public function getDeleteRouteAttribute()
    {
        return route("ventas.destroy", $this);
    }

    public function getShowRouteAttribute()
    {
        return route("ventas.show", $this);
    }

    public function getClienteAttribute()
    {
        return $this->cliente()->get();
    }

    public function tipoServicios()
    {
        return $this->belongsToMany("App\TipoServicio")
            ->withPivot("precio_unitario", "cantidad", "valor");
    }

    public function cliente()
    {
        return $this->belongsTo("App\Cliente");
    }

    public function formaPago()
    {
        return $this->belongsTo("App\FormaPago");
    }

    public function getValorDescuentoAttribute()
    {
        if ($this->tipo_descuento != null) {
            switch ($this->tipo_descuento) {
                case "FIXED":
                    return $this->descuento;
                    break;
                case "PERCENT":
                    return $this->subtotal * ($this->descuento / 100);
            }
        }
        return 0;
    }

    public function getSubtotalAttribute()
    {
        return $this->tipoServicios->reduce(function ($carry, $item) {
            return $carry + $item->pivot->valor;
        });
    }

    public function getTotalAttribute()
    {
        return $this->subtotal - $this->valorDescuento;
    }
}
