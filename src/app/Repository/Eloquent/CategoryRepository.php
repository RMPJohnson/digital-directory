<?php

namespace App\Repository\Eloquent;
use \App\Repository\CategoryRepositoryInterface;
use \App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /*
     * var $model
     */
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
