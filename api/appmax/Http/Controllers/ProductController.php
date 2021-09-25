<?php

namespace AppMax\Http\Controllers;

use AppMax\Http\Requests\Product\StoreRequest;
use AppMax\Http\Requests\Product\UpdateRequest;
use AppMax\Services\ProductService;

class ProductController extends AbstractController
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        $this->storeRequest = StoreRequest::class;
        $this->updateRequest = UpdateRequest::class;
    }
}
