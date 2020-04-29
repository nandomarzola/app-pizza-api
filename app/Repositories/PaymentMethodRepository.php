<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository extends BaseRepository
{
    /**
     * @return string
     */
    function model()
    {
        return PaymentMethod::class;
    }
}
