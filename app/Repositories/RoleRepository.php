<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Role::class;
    }
}
