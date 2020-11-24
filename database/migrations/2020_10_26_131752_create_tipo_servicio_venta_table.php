<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoServicioVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_servicio_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId("venta_id")->constrained();
            $table->foreignId("tipo_servicio_id")->constrained();
            $table->unsignedInteger("precio_unitario");
            $table->unsignedInteger("cantidad");
            $table->unsignedInteger("valor");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_servicio_venta');
    }
}
