<?php

namespace AppMax\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $this->beginTransaction();
        $this->model->create($data);
        $this->commit();
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($data, $id)
    {
        $findResult = $this->find($id);
        $this->beginTransaction();
        $findResult->update($data);
        $this->commit();
        return $findResult;
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }

    protected function beginTransaction()
    {
        return DB::beginTransaction();
    }

    protected function commit()
    {
        return DB::commit();
    }
}
