<?php

namespace AppMax\Observers;

use AppMax\Models\Product;
use AppMax\Models\ProductMoviment;
use AppMax\Repositories\ProductRepository;
use Illuminate\Support\Facades\App;

class ProductMovimentObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \AppMax\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $moviment = 'Valor Inicial';

        ProductMoviment::create($this->data($product, $moviment));
    }

    public function updating(Product $product)
    {
        $productRepository = App::make(ProductRepository::class);
        $oldQuantity = $productRepository->verifyQuantity($product->id);

        $moviment = '';

        if ($product->quantity > $oldQuantity->quantity) {
            $moviment = 'Adicionado';
        } elseif ($product->quantity < $oldQuantity->quantity) {
            $moviment = 'Removido';
        } else {
            $moviment = 'Valor Inalterado';
        }

        ProductMoviment::create($this->data($product, $moviment));
    }

    protected function data($model, $moviment)
    {
        $data = [
            'sku' => $model->sku,
            'quantity' => $model->quantity,
            'moviment' => $moviment
        ];

        return $data;
    }
}
