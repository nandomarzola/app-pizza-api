<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderItem extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'pizza_id',
        'qty',
        'total',
        'preferences'
    ];

    /**
     * Get the order
     *
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the order pizza
     *
     * @return BelongsTo
     */
    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }
}
