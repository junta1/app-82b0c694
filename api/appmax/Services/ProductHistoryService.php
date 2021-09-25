<?php

namespace AppMax\Services;

use AppMax\Repositories\ProductHistoryRepository;

class ProductHistoryService extends AbstractService
{
    protected $repository;

    public function __construct(ProductHistoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
