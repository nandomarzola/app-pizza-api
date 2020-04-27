<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\PizzaIngredientRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class PizzaIngredientController extends CrudController
{
    /**
     * @var PizzaIngredientRepository
     */
    protected $repository;

    /**
     * PizzaIngredientController constructor.
     * @param PizzaIngredientRepository $repository
     * @return void
     */
    public function __construct(PizzaIngredientRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'pizza_ingredient';
        $this->pluralAlias = 'pizza_ingredients';
        $this->validationRules = [
            'pizza_id' => 'required|exists:App\Models\Pizza,id',
            'ingredients' => 'required|array',
            'ingredients.*' => 'exists:App\Models\Ingredient,id'
        ];
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function store(Request $request)
    {
        // Validate data
        $data = $request->validate($this->validationRules);

        foreach ($data['ingredients'] as $ingredient) {
            // Create register
            $this->repository->create([
                'pizza_id' => $data['pizza_id'],
                'ingredient_id' => $ingredient
            ]);
        }

        // Return the created register
        return response()->json([
            "message" => 'The ingredients was added on the pizza successfully'
        ]);
    }
}
