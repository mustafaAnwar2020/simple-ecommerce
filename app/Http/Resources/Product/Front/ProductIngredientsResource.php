<?php

namespace App\Http\Resources\Product\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductIngredientsResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
        ];
    }
}
