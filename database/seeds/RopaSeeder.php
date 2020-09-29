<?php

use Illuminate\Database\Seeder;
use App\Ropa;

class RopaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(database_path("imports/Prendas.csv")));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        foreach ($csv as $row) {
            $row["img"] = ("img/ICONOS_ROPA/" . $row["name"] . ".png");
            Ropa::create($row);
        }
    }
}
