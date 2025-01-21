<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //'name' => 'Test User',
        //'email' => 'test@example.com',
        //]);
        //LLamo al seeder
        $this->call(CategorySeeder::class);
        //Llamo al factory y creo los 15 usuarios que pide el enunciado
        Product::factory(15)->create();
    }
}
