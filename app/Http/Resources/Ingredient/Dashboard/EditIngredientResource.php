<?php

namespace App\Http\Resources\Ingredient\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class EditIngredientResource extends JsonResource
{

    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'name' => collect(config('app.supported_locales'))->mapWithKeys(function ($locale) {
                return [$locale => $this->translate($locale)->name];
            })->toArray(),
            'stock' => $this->stock->stock,
            'unit' => $this->stock->unit,
            'created_at' => $this->created_at_date_time,
        ];
    }
}
