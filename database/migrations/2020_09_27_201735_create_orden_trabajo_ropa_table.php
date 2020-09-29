<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajoRopaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajo_ropa', function (Blueprint $table) {
            $table->id();

            $table->foreignId("orden_trabajo_id")->constrained();
            $table->foreignId("ropa_id")->constrained();

            $table->unsignedInteger("cantidad");
            $table->boolean("planchar");

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
        Schema::dropIfExists('orden_trabajo_ropaç');
    }
}
