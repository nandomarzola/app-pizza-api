<?php

namespace App\Http\Controllers;

use App\Repositories\PizzaRepository;

class PizzaController extends CrudController
{
    /**
     * @var PizzaRepository
     */
    protected $repository;

    /**
     * PizzaController constructor.
     * @param PizzaRepository $repository
     * @return void
     */
    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'pizza';
        $this->pluralAlias = 'pizzas';
        $this->validationRules = [
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,9999.99',
            'picture' => 'nullable|max:255',
            'category_id' => 'required|exists:App\Models\Category,id'
        ];
    }
}
