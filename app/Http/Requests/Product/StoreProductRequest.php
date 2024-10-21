<?php

namespace App\Http\Requests\Product;

use App\Enums\MimeTypes;
use App\Enums\ProductSource;
use App\Enums\DiscountTypes;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'sku' => 'required|string|unique:products,sku|min:3|max:255',
            'barcode' => 'required|string|unique:products,barcode|min:3|max:255',
            'active' => 'nullable|boolean',
            'source' => 'nullable|in:' . implode(',', ProductSource::getAllValues()),
            'cost' => 'required|numeric',
            'price' => 'required|numeric|gt:cost',
            'discount' => 'required|numeric',
            'discount_type' => 'required|in:' . implode(',', DiscountTypes::getAllValues()),
            'ingredients' => 'required|array',
            'ingredients.*.id' => 'required|exists:ingredients,id',
            'ingredients.*.stock' => 'required|int|min:1|max:1000',
            'images' => 'nullable|array',
            'images.*.image' => 'required|mimes:' . implode(',', MimeTypes::getAllValues()) . '|max:5120',
            'images.*.is_main' => [
                'required',
                'boolean',
                function ($attr, $value, $fail) {
                    $count = 0;
                    foreach (request()->images as $media) {
                        if ($media['is_main'] == 1)
                            $count++;
                    }

                    if ($count > 1) {
                        $fail(trans('validation.products.images.*.is_main.distinct'));
                    }
                }
            ],
        ];

        foreach (config('app.available_locales') as $locale) {
            $rules["$locale"] = 'required|array';
            $rules["$locale.name"] = 'required|string|min:3|max:255';
            $rules["$locale.description"] = 'required|string|min:3';
            $rules["$locale.slug"] = 'required|string|min:3|unique:product_translations,slug';
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'sku.required' => trans('validation.products.sku.required'),
            'sku.string' => trans('validation.products.sku.string'),
            'sku.unique' => trans('validation.products.sku.unique'),
            'sku.min' => trans('validation.products.sku.min'),
            'sku.max' => trans('validation.products.sku.max'),
            'barcode.required' => trans('validation.products.barcode.required'),
            'barcode.string' => trans('validation.products.barcode.string'),
            'barcode.unique' => trans('validation.products.barcode.unique'),
            'barcode.min' => trans('validation.products.barcode.min'),
            'barcode.max' => trans('validation.products.barcode.max'),
            'active.required' => trans('validation.products.active.required'),
            'active.boolean' => trans('validation.products.active.boolean'),
            'cost.required' => trans('validation.products.options.*.cost.required'),
            'cost.numeric' => trans('validation.products.options.*.cost.numeric'),
            'price.required' => trans('validation.products.options.*.price.required'),
            'price.numeric' => trans('validation.products.options.*.price.numeric'),
            'price.gt' => trans('validation.products.options.*.price.gt'),
            'discount.required' => trans('validation.products.options.*.discount.required'),
            'discount.numeric' => trans('validation.products.options.*.discount.numeric'),
            'discount_type.required' => trans('validation.products.options.*.discount_type.required'),
            'discount_type.in' => trans('validation.products.options.*.discount_type.in'),
            'ingredients.required' => trans('validation.products.options.*.ingredients.required'),
            'ingredients.*.id.required' => trans('validation.products.options.*.ingredients.*.id.required'),
            'ingredients.*.id.exists' => trans('validation.products.options.*.ingredients.*.id.exists'),
            'ingredients.*.stock.required' => trans('validation.products.options.*.ingredients.*.stock.required'),
            'ingredients.*.stock.int' => trans('validation.products.options.*.ingredients.*.stock.int'),
            'images.nullable' => trans('validation.products.images.nullable'),
            'images.*.image.required' => trans('validation.products.images.image.required'),
            'images.*.image.image' => trans('validation.products.images.image.image'),
            'images.*.image.mimes' => trans('validation.products.images.image.mimes'),
            'images.*.image.max' => trans('validation.products.images.image.max'),
            'images.*.is_main.required' => trans('validation.products.images.is_main.required'),
            'images.*.is_main.boolean' => trans('validation.products.images.is_main.boolean'),
            'images.*.is_main.distinct' => trans('validation.products.images.is_main.distinct'),
        ];

        foreach (config('app.available_locales') as $locale) {
            $messages["$locale.required"] = trans("validation.$locale.products.required");
            $messages["$locale.array"] = trans("validation.$locale.products.array");
            $messages["$locale.name.required"] = trans("validation.$locale.products.name.required");
            $messages["$locale.name.string"] = trans("validation.$locale.products.name.string");
            $messages["$locale.name.min"] = trans("validation.$locale.products.name.min");
            $messages["$locale.name.max"] = trans("validation.$locale.products.name.max");
            $messages["$locale.description.required"] = trans("validation.$locale.products.description.required");
            $messages["$locale.description.string"] = trans("validation.$locale.products.description.string");
            $messages["$locale.description.min"] = trans("validation.$locale.products.description.min");
            $messages["$locale.description.required"] = trans("validation.$locale.products.description.required");
            $messages["$locale.description.string"] = trans("validation.$locale.products.description.string");
            $messages["$locale.description.min"] = trans("validation.$locale.products.description.min");
            $messages["$locale.slug.required"] = trans("validation.$locale.products.slug.required");
            $messages["$locale.slug.string"] = trans("validation.$locale.products.slug.string");
            $messages["$locale.slug.min"] = trans("validation.$locale.products.slug.min");
        }

        return $messages;
    }
}
