<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\IngredientSupport;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['id' => IngredientSupport::MOZZARELLA, 'name' => 'Mozzarella'],
            ['id' => IngredientSupport::TOMATO_SAUCE, 'name' => 'Tomato Sauce'],
            ['id' => IngredientSupport::OLIVE_OIL, 'name' => 'Olive Oil'],
            ['id' => IngredientSupport::GARLIC, 'name' => 'Garlic'],
            ['id' => IngredientSupport::RICOTTA, 'name' => 'Ricotta'],
            ['id' => IngredientSupport::PEPPERONI, 'name' => 'Pepperoni'],
            ['id' => IngredientSupport::BACON, 'name' => 'Bacon'],
            ['id' => IngredientSupport::HAM, 'name' => 'Ham'],
            ['id' => IngredientSupport::MUSHROOM, 'name' => 'Mushroom'],
            ['id' => IngredientSupport::ONION, 'name' => 'Onion'],
            ['id' => IngredientSupport::BLACK_OLIVES, 'name' => 'Black Olives'],
            ['id' => IngredientSupport::PINEAPPLE, 'name' => 'Pineapple'],
            ['id' => IngredientSupport::BBQ_SAUCE, 'name' => 'BBQ Sauce'],
            ['id' => IngredientSupport::SPINACH, 'name' => 'Spinach'],
            ['id' => IngredientSupport::GREEN_PEPPER, 'name' => 'Green Pepper'],
            ['id' => IngredientSupport::CHICKEN, 'name' => 'Chicken'],
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'id' => $ingredient['id'],
                'name' => $ingredient['name'],
                'price' => 1.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
