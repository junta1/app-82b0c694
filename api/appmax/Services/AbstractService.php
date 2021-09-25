<?php

namespace AppMax\Services;

use AppMax\Repositories\AbstractRepository;

abstract class AbstractService
{
    protected $repository;
    protected $requestStore;

    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all($filter)
    {
        return $this->repository->all($filter);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function save($data)
    {
        return $this->repository->store($data);
    }

    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->destroy($id);
    }
}
