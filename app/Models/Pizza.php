<?php

namespace App\Models;

use Illuminate\Container\Container;
use Illuminate\Notifications\Notifiable;
use App\Repositories\PizzaIngredientRepository;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pizza extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'picture',
        'category_id'
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'ingredients'
    ];

    /**
     * Get the pizza's category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getIngredientsAttribute() {
        $pizzaIngredientRepository = new PizzaIngredientRepository(Container::getInstance());

        $ingredients = $pizzaIngredientRepository->with(['ingredient'])->findWhere(
            [ 'pizza_id' => $this->id ]
        );

        return $ingredients->toArray();
    }
}
