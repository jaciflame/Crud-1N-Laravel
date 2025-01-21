<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valores = [
            "Electronica" => "#E57373",
            "Alimentacion" => "#9575CD",
            "Informatica" => "#F06292",
            "Limpieza" => "#64B5F6"

        ];
        ksort($valores);
        foreach ($valores as $nombre => $color) {
            Category::create(compact("nombre", "color"));
        }
    }
}
