<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return User::class;
    }
}
