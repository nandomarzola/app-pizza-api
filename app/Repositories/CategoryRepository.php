<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Category::class;
    }
}
