<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\IngredientSupport;

class PizzaIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = [
            [
                'id' => 1,
                'name' => 'Cheese Pizza',
                'ingredients' => [
                    IngredientSupport::MOZZARELLA,
                    IngredientSupport::TOMATO_SAUCE,
                ]
            ],
            [
                'id' => 2,
                'name' => 'White Pizza',
                'ingredients' => [
                    IngredientSupport::OLIVE_OIL,
                    IngredientSupport::GARLIC,
                    IngredientSupport::MOZZARELLA,
                    IngredientSupport::RICOTTA,
                ]
            ],
            [
                'id' => 3,
                'name' => 'White Pepperoni Pizza',
                'ingredients' => [
                    IngredientSupport::PEPPERONI,
                    IngredientSupport::TOMATO_SAUCE,
                    IngredientSupport::MOZZARELLA,
                ]
            ],
            [
                'id' => 4,
                'name' => 'Planet Special Pizza',
                'ingredients' => [
                    IngredientSupport::PEPPERONI,
                    IngredientSupport::HAM,
                    IngredientSupport::BACON,
                    IngredientSupport::MUSHROOM,
                    IngredientSupport::ONION,
                    IngredientSupport::GREEN_PEPPER,
                    IngredientSupport::BLACK_OLIVES,
                    IngredientSupport::SPINACH,
                ]
            ],
            [
                'id' => 5,
                'name' => 'BBQ Chicken Pizza',
                'ingredients' => [
                    IngredientSupport::CHICKEN,
                    IngredientSupport::BBQ_SAUCE,
                    IngredientSupport::MOZZARELLA,
                ]
            ],
            [
                'id' => 6,
                'name' => 'Hawaiian Pizza',
                'ingredients' => [
                    IngredientSupport::MOZZARELLA,
                    IngredientSupport::HAM,
                    IngredientSupport::PINEAPPLE,
                ]
            ],
            [
                'id' => 7,
                'name' => 'Meat Lovers Pizza',
                'ingredients' => [
                    IngredientSupport::PEPPERONI,
                    IngredientSupport::HAM,
                    IngredientSupport::BACON,
                    IngredientSupport::MOZZARELLA,
                ]
            ],
            [
                'id' => 8,
                'name' => 'Chicken & Bacon Pizza',
                'ingredients' => [
                    IngredientSupport::MOZZARELLA,
                    IngredientSupport::CHICKEN,
                    IngredientSupport::BACON,
                    IngredientSupport::RICOTTA,
                ]
            ],
            [
                'id' => 9,
                'name' => 'Vegetarian Pizza',
                'ingredients' => [
                    IngredientSupport::MUSHROOM,
                    IngredientSupport::ONION,
                    IngredientSupport::GREEN_PEPPER,
                    IngredientSupport::BLACK_OLIVES,
                    IngredientSupport::SPINACH,
                    IngredientSupport::OLIVE_OIL,
                ]
            ],
            [
                'id' => 10,
                'name' => 'Popeye Pizza',
                'ingredients' => [
                    IngredientSupport::SPINACH,
                    IngredientSupport::OLIVE_OIL,
                    IngredientSupport::ONION,
                ]
            ],
        ];

        foreach ($pizzas as $pizza) {
            foreach ($pizza['ingredients'] as $ingredient) {
                DB::table('pizza_ingredients')->insert([
                    'pizza_id' => $pizza['id'],
                    'ingredient_id' => $ingredient,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
