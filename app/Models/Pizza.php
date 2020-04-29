<?php

namespace App\Models;

use Illuminate\Container\Container;
use Illuminate\Notifications\Notifiable;
use App\Repositories\PizzaIngredientRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return array
     */
    public function getIngredientsAttribute(): array
    {
        $pizzaIngredientRepository = new PizzaIngredientRepository(Container::getInstance());

        $ingredients = $pizzaIngredientRepository->with(['ingredient'])->findWhere(
            [ 'pizza_id' => $this->id ]
        );

        return $ingredients->toArray();
    }
}
