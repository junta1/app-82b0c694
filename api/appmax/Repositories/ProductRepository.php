<?php

namespace AppMax\Repositories;

use AppMax\Models\Product;

class ProductRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
}
