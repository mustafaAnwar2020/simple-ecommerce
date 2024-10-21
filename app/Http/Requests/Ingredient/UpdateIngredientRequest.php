<?php

namespace App\Http\Requests\Ingredient;

use App\Enums\StockTypes;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIngredientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
        ];

        foreach (config('app.available_locales') as $locale) {
            $rules["$locale.name"] = 'required|string|min:3|max:255';
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
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
