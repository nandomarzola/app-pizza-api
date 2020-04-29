<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Address::class;
    }
}
