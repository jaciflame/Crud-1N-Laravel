<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //Añado datos a la BD con Faker
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            "nombre" => fake()->unique()->sentence(3, true),
            "descripcion" => fake()->text(150),
            "imagen" => "img/imagenes/" . fake()->picsum("public/storage/img/imagenes", 300, 300, false),
            "stock" => random_int(0, 500),
            "category_id" => Category::all()->random()->id
        ];
    }
}
