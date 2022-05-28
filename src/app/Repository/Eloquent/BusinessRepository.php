<?php

namespace App\Repository\Eloquent;
use \App\Repository\BusinessRepositoryInterface;
use \App\Models\Business;

class BusinessRepository extends BaseRepository implements BusinessRepositoryInterface
{
    /*
     * var $model
     */
    protected $model;

    public function __construct(Business $model)
    {
        $this->model = $model;
    }
}
