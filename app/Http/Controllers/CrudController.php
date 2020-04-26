<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Abstract class created to group all the basic functions of a CRUD operation,
 * since they are basically the same
 *
 * Class CrudController
 * @package App\Http\Controllers
 */
abstract class CrudController extends Controller
{
    /**
     * @var string
     */
    protected $singularAlias = 'data';

    /**
     * @var string
     */
    protected $pluralAlias = 'data';

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request)
    {
        $data = $this->repository->all();
        return response()->json([
            "{$this->pluralAlias}" => $data
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function fetchOne(Request $request, string $id)
    {
        $data = $this->repository->find($id);
        return response()->json([
            "{$this->singularAlias}" => $data->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function store(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'name' => "required|max:255|unique:{$this->pluralAlias}"
        ]);

        // Create register
        $data = $this->repository->create($data);

        // Return the created register
        return response()->json([
            "{$this->singularAlias}" => $data->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function update(Request $request, string $id)
    {
        // Validate data
        $data = $request->validate([
            'name' => "required|max:255|unique:{$this->pluralAlias},name," . $id
        ]);

        // Update register
        $data = $this->repository->update($data, $id);

        // Return the updated register
        return response()->json([
            "{$this->singularAlias}" => $data->toArray()
        ]);
    }

    public function destroy(Request $request, string $id)
    {
        // Delete register
        $this->repository->delete($id);

        return response()->json(['message' => "The {$this->singularAlias} was deleted successfully"]);
    }
}
