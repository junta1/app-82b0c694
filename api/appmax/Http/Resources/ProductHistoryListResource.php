<?php

namespace AppMax\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductHistoryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'sku' => $this->sku,
            'quantity' => $this->quantity,
            'moviment' => $this->moviment,
            'current_quantity' => $this->current_quantity,
            'date_moviment' => Carbon::parse($this->created_at)->format('Y/m/d H:i:s'),
        ];

        return $data;
    }
}
