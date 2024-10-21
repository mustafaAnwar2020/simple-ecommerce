<?php

namespace App\Http\Requests\Ingredient;

use App\Enums\StockUnit;
use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'stock' => 'required|int',
            'unit' => 'required|in:' . implode(',', StockUnit::getAllValues()),
        ];

        foreach (config('app.available_locales') as $locale) {
            $rules["$locale.name"] = 'required|string|min:3|max:255';
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'stock.required' => trans("validation.ingredients.stock.required"),
            'stock.int' => trans("validation.ingredients.stock.int"),
            'stock_type.required' => trans("validation.ingredients.stock_type.required"),
            'stock_type.in' => trans("validation.ingredients.stock_type.in"),
        ];

        foreach (config('app.available_locales') as $locale) {
            $messages["$locale.name.required"] = trans("validation.ingredients.name.*.$locale.required");
            $messages["$locale.name.string"] = trans("validation.ingredients.name.*.$locale.string");
            $messages["$locale.name.min"] = trans("validation.ingredients.name.*.$locale.min");
            $messages["$locale.name.max"] = trans("validation.ingredients.name.*.$locale.max");
        }

        return $messages;
    }
}
