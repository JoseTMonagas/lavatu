<?php

use Illuminate\Database\Seeder;

class RopaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = \App\Category::where('name', "Prenda Superior")->first();
        $categoria->ropas()->create(["name" => "Camisa", "img" => asset("img/ICONOS_ROPA/ICONOS_WEB-27.png")]);
        $categoria->ropas()->create(["name" => "Poleron", "img" => asset("img/ICONOS_ROPA/ICONOS_WEB-33.png")]);


        $categoria = \App\Category::where('name', "Prenda Inferior")->first();
        $categoria->ropas()->create(["name" => "Bermudas", "img" => asset("img/ICONOS_ROPA/ICONOS_WEB-06.png")]);
        $categoria->ropas()->create(["name" => "Jeans", "img" => asset("img/ICONOS_ROPA/ICONOS_WEB-11.png")]);
    }
}
