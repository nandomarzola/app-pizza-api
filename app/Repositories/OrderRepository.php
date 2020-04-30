<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return Order::class;
    }
}
