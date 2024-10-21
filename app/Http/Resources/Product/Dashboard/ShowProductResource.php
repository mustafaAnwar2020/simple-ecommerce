<?php

namespace App\Http\Resources\Product\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\Dashboard\ImagesResource;
use App\Http\Resources\Product\Dashboard\ProductIngredientsResource;

class ShowProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
            'description' => $this->translate(app()->getLocale())->description,
            'slug' => $this->translate(app()->getLocale())->slug,
            'sku' => $this->sku,
            'barcode' => $this->barcode,
            'active' => $this->active,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'ingredients' => ProductIngredientsResource::collection($this->ingredients),
            'images' => ImagesResource::collection($this->images),
            'created_at' => $this->created_at_date_time,
        ];
    }
}
