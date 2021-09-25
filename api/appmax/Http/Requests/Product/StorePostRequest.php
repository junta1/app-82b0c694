<?php

namespace AppMax\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;

class StorePostRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'sku' => 'required|max:255',
            'quantity' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'name.max' => 'O campo nome possui o tamanho máximo de 255 caracteres!',
            'name.min' => 'O campo nome possui o tamanho mínimo de 3 caracteres!',

            'sku.required' => 'O campo sku é obrigatório!',
            'sku.max' => 'O campo sku possui o tamanho máximo de 255 caracteres!',
            
            'quantity.required' => 'O campo quantity é obrigatório!',
        ];
    }
}
