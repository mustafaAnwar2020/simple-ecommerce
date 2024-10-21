<?php

namespace App\Http\Resources\Product\Front;

use App\Traits\ProductDiscountTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\Front\ProductIngredientsResource;

class ListProductResource extends JsonResource
{
    use ProductDiscountTrait;

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'price_after_discount' => $this->calculateDiscount($this->discount_type,$this->discount,$this->price),
            'ingredients' => ProductIngredientsResource::collection($this->ingredients),
            // 'image' => $this->MainImage?->getFirstMediaUrl('App\Models\Product'),
        ];
    }
}
