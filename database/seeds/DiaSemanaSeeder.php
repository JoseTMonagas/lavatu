<?php

use App\DiaSemana;
use Illuminate\Database\Seeder;

class DiaSemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dias = [
            ["nombre" => "TODOS LOS DÍAS"],
            ["nombre" => "LUNES"],
            ["nombre" => "MARTES"],
            ["nombre" => "MIÉRCOLES"],
            ["nombre" => "JUEVES"],
            ["nombre" => "VIERNES"],
            ["nombre" => "SABADO"],
            ["nombre" => "DOMINGO"],
        ];

        foreach($dias as $dia) {
            DiaSemana::create($dia);
        }
    }
}
