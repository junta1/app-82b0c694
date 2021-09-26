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
        $addRm = '';

        if ($product->quantity > $oldQuantity->quantity) {
            $moviment = 'Adicionado';
            $addRm = $product->quantity - $oldQuantity->quantity;
        } elseif ($product->quantity < $oldQuantity->quantity) {
            $moviment = 'Removido';
            $addRm = $oldQuantity->quantity - $product->quantity;
        } else {
            $moviment = 'Valor Inalterado';
        }

        ProductMoviment::create($this->data($product, $moviment, $addRm));
    }

    protected function data($model, $moviment, $addRm = null)
    {
        $data = [
            'sku' => $model->sku,
            'quantity' => (empty($addRm) ? $model->quantity : $addRm),
            'moviment' => $moviment,
            'current_quantity' => $model->quantity,
        ];

        return $data;
    }
}
