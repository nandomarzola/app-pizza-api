<?php

namespace App\Repositories;

use App\Models\Pizza;

class PizzaRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Pizza::class;
    }
}
