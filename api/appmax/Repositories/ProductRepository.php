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

    public function verifyQuantity($id)
    {
        return $this->model->select('quantity')->where('id', '=', $id)->first();
    }

    public function uniqueSku($sku)
    {
        return $this->model->select('sku')->where('sku', '=', $sku)->get();
    }
}
