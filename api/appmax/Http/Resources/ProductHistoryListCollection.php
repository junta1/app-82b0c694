<?php

namespace AppMax\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductHistoryListCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ProductHistoryListResource::collection($this->collection);
    }
}
