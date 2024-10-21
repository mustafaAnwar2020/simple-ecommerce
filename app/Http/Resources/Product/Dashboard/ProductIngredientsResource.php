<?php

namespace App\Http\Resources\Product\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductIngredientsResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
            'stock' => $this->pivot->stock,
        ];
    }
}
