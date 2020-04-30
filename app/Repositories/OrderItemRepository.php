<?php

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return OrderItem::class;
    }
}
