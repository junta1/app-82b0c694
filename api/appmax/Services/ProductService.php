<?php

namespace AppMax\Services;

use AppMax\Repositories\ProductRepository;
use Exception;

class ProductService extends AbstractService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($data, $id)
    {
        $quantityNew = $this->removeOrAdd($data, $id);

        $data['quantity'] = $quantityNew;

        return $this->repository->update($data, $id);
    }

    protected function removeOrAdd($data, $id)
    {
        $oldQuantity = $this->repository->verifyQuantity($id);

        $hasNegative = $this->checkNegativeNumber((int)$data['quantity']);

        $quantity = '';
        if ($hasNegative) {
            $quantity = $oldQuantity->quantity - ((int)$data['quantity'] * -1);

            if ($quantity < 0) {
                throw new Exception('A quantidade não pode ser menor que zero.');
            }
        } else {
            $quantity = $oldQuantity->quantity + (int)$data['quantity'];
        }

        return $quantity;
    }

    protected function checkNegativeNumber($number)
    {
        if (substr(strval($number), 0, 1) == "-") {
            return true;
        } else {
            return false;
        }
    }
}
