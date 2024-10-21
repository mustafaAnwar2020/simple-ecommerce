<?php

namespace App\Http\Resources\Product\Dashboard;

use App\Http\Resources\SimpleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\Dashboard\ImagesResource;
use App\Http\Resources\Product\Dashboard\Options\ListOptionsResource;

class EditProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => collect(config('app.supported_locales'))->mapWithKeys(function ($locale) {
                return [$locale => $this->translate($locale)->name];
            })->toArray(),
            'description' => collect(config('app.supported_locales'))->mapWithKeys(function ($locale) {
                return [$locale => $this->translate($locale)->description];
            })->toArray(),
            'slug' => collect(config('app.supported_locales'))->mapWithKeys(function ($locale) {
                return [$locale => $this->translate($locale)->slug];
            })->toArray(),
            'sku' => $this->sku,
            'barcode' => $this->barcode,
            'active' => $this->active,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'ingredients_ids' => $this->ingredients->pluck('id'),
            'ingredients' => ProductIngredientsResource::collection($this->ingredients),
            'images_ids' => $this->images->pluck('id'),
            'images' => ImagesResource::collection($this->images),
            'created_at' => $this->created_at_date_time,
        ];
    }
}
