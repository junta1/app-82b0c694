<?php

namespace AppMax\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($filter = [])
    {
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($data, $id)
    {
        $findResult = $this->find($id);

        return $findResult->update($data);
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }
}
