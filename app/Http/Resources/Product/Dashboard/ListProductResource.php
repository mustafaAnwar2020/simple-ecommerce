<?php

namespace App\Http\Resources\Product\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ListProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'image' => $this->MainImage?->getFirstMediaUrl('App\Models\Product'),
            'created_at' => $this->created_at_date_time,
        ];
    }
}
