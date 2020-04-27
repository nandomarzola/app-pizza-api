<?php

namespace App\Repositories;

use App\Models\PizzaIngredient;

class PizzaIngredientRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return PizzaIngredient::class;
    }
}
