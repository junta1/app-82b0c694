<?php

namespace AppMax\Http\Rules;

use AppMax\Repositories\ProductRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;

class uniqueSkuStore implements Rule
{
    protected $repository;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = App::make(ProductRepository::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $uniqueSku = $this->repository->uniqueSku($value);

        if(count($uniqueSku) > 0){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo sku é único.';
    }
}
