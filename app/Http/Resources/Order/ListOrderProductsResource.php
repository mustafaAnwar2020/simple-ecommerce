<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class ListOrderProductsResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->product->translate(app()->getLocale())->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'paid_total' => $this->paid_total,
        ];
    }
}
