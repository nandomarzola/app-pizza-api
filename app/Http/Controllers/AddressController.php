<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;

class AddressController extends CrudController
{
    /**
     * @var AddressRepository
     */
    protected $repository;

    /**
     * AddressController constructor.
     * @param AddressRepository $repository
     * @return void
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'address';
        $this->pluralAlias = 'addresses';
        $this->validationRules = [
            'user_id' => 'required|exists:App\Models\User,id',
            'street' => 'required|max:255',
            'number' => 'nullable|max:255',
            'complement' => 'nullable|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|max:255',
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(\Illuminate\Http\Request $request)
    {
        // Validate data
        $data = $request->validate($this->validationRules);

        $address = $this->repository->findByField('user_id', $data['user_id'])->first();

        if (!$address) {
            // Create address
            $address = $this->repository->create($data);
        }

        // Return the address
        return response()->json([
            "{$this->singularAlias}" => $address->toArray()
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function myAddress()
    {
        $data = $this->repository->findByField('user_id', auth()->user()->id);

        if ($data) {
            $data = $data->first();
        }

        return response()->json([
            "{$this->singularAlias}" => $data
        ]);
    }
}
