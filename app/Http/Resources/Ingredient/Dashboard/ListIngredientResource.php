<?php

namespace App\Http\Resources\Ingredient\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ListIngredientResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->translate(app()->getLocale())->name,
            'created_at' => $this->created_at_date_time,
        ];
    }
}
