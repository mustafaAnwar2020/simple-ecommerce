<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\ListOrderProductsResource;

class ListOrdersResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'total' => $this->total,
            'products' => ListOrderProductsResource::collection($this->orderProducts),
        ];
    }
}
