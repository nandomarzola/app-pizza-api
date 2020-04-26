<?php

namespace App\Http\Controllers;

use App\Repositories\IngredientRepository;

class IngredientController extends CrudController
{
    /**
     * @var IngredientRepository
     */
    protected $repository;

    /**
     * IngredientController constructor.
     * @param IngredientRepository $repository
     * @return void
     */
    public function __construct(IngredientRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'ingredient';
        $this->pluralAlias = 'ingredients';
        $this->validationRules = [
            'name' => "required|max:255|unique:{$this->pluralAlias}",
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,9999.99'
        ];
    }
}
