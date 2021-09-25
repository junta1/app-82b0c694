<?php

namespace AppMax\Services;

use AppMax\Repositories\ProductRepository;

class ProductService extends AbstractService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
}
