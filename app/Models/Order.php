<?php

namespace App\Models;

use Illuminate\Container\Container;
use Illuminate\Notifications\Notifiable;
use App\Repositories\OrderItemRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'payment_method_id',
        'sub_total',
        'delivery_cost',
        'total'
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'items'
    ];

    /**
     * Get the order user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order address
     *
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the order payment method
     *
     * @return BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * @return array
     */
    public function getItemsAttribute(): array
    {
        $orderItemRepository = new OrderItemRepository(Container::getInstance());

        $items = $orderItemRepository->with(['pizza', 'pizza.category'])->findWhere(
            [ 'order_id' => $this->id ]
        );

        return $items->toArray();
    }
}
