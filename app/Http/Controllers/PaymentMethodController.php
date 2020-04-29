<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentMethodRepository;

class PaymentMethodController extends CrudController
{
    /**
     * @var PaymentMethodRepository
     */
    protected $repository;

    /**
     * PaymentMethodController constructor.
     * @param PaymentMethodRepository $repository
     * @return void
     */
    public function __construct(PaymentMethodRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'payment_method';
        $this->pluralAlias = 'payment_methods';
        $this->validationRules = [
            'name' => "required|max:255|unique:{$this->pluralAlias}"
        ];
    }
}
