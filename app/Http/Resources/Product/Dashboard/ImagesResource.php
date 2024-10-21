<?php

namespace App\Http\Resources\Product\Dashboard;

use App\Http\Resources\SimpleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ImagesResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'is_main' => (bool)$this->is_main,
            'image' => $this->getFirstMediaUrl('App\Models\Product'),
            'created_at' => $this->created_at_date_time,
        ];
    }
}
