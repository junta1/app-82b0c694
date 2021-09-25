<?php

namespace AppMax\Repositories;

use AppMax\Models\ProductMoviment;

class ProductHistoryRepository extends AbstractRepository
{
    protected $model;

    public function __construct(ProductMoviment $product)
    {
        $this->model = $product;
    }

    public function all($filter = [])
    {
        return $this->model->where('sku', '=', $filter['sku'])->get();
    }
}
