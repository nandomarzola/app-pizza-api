<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Person::class;
    }
}
