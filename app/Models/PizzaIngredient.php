<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PizzaIngredient extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pizza_id',
        'ingredient_id'
    ];

    /**
     * Get the pizza
     *
     * @return BelongsTo
     */
    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }

    /**
     * Get the ingredient
     *
     * @return BelongsTo
     */
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
