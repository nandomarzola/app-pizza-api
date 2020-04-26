<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

class CategoryController extends CrudController
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $repository
     * @return void
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->singularAlias = 'category';
        $this->pluralAlias = 'categories';
    }
}
