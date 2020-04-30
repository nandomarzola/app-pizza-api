<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\OrderRepository;
use App\Repositories\OrderItemRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class OrderController extends CrudController
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    /**
     * @var OrderItemRepository
     */
    protected $orderItemRepository;

    /**
     * OrderController constructor.
     * @param OrderRepository $repository
     * @param OrderItemRepository $orderItemRepository
     * @return void
     */
    public function __construct(OrderRepository $repository, OrderItemRepository $orderItemRepository)
    {
        $this->repository = $repository;
        $this->orderItemRepository = $orderItemRepository;
        $this->singularAlias = 'order';
        $this->pluralAlias = 'orders';
        $this->validationRules = [
            'user_id' => 'required|exists:App\Models\User,id',
            'address_id' => 'required|exists:App\Models\Address,id',
            'payment_method_id' => 'required|exists:App\Models\PaymentMethod,id',
            'sub_total' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,999999.99',
            'delivery_cost' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,9999.99',
            'total' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,999999.99',
            'items' => 'required|array',
            'items.*' => 'required|array',
            'items.*.pizza_id' => 'required|exists:App\Models\Pizza,id',
            'items.*.qty' => 'required|numeric',
            'items.*.total' => 'required|numeric|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|between:0,999999.99',
            'items.*.preferences' => 'nullable',
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

        $orderItems = $data['items'];
        unset($data['items']);

        // Create order
        $order = $this->repository->create($data);

        // Create order items
        foreach ($orderItems as $item) {
            $this->orderItemRepository->create([
                'order_id' => $order->id,
                'pizza_id' => $item['pizza_id'],
                'qty' => $item['qty'],
                'total' => $item['total'],
                'preferences' => $item['preferences'],
            ]);
        }

        // Return the created register
        return response()->json([
            "{$this->singularAlias}" => $order
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function myOrders()
    {
        $data = $this->repository->with(['paymentMethod', 'address'])->findByField('user_id', auth()->user()->id);

        return response()->json([
            "{$this->pluralAlias}" => $data
        ]);
    }
}
