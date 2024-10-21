<?php

namespace App\Http\Requests\Order;


use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|int|min:1',
        ];


    }

    public function messages(): array
    {
        return [
            'products.required' => __('validation.orders.products.required'),
            'products.array' => __('validation.orders.products.array'),
            'products.*.id.required' => __('validation.orders.products.*.id.required'),
            'products.*.id.exists' => __('validation.orders.products.*.id.exists'),
            'products.*.quantity.required' => __('validation.orders.products.*.quantity.required'),
            'products.*.quantity.int' => __('validation.orders.products.*.quantity.int'),
            'products.*.quantity.min' => __('validation.orders.products.*.quantity.min'),
        ];
    }
}
