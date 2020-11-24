<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_ingreso")->nullable();
            $table->date("fecha_venta")->nullable();
            $table->foreignId("cliente_id")->constrained();
            $table->foreignId("forma_pago_id")->nullable()->constrained();
            $table->string("folio")->nullable();
            $table->string("tipo_descuento")->nullable();
            $table->unsignedInteger("descuento")->default(0);
            $table->string("observaciones")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('ventas');
    }
}
