<?php

namespace App\Repositories;

use App\Models\Ingredient;

class IngredientRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Ingredient::class;
    }
}
