<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|min:3|max:255',
            'password' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => trans('validation.users.required.password'),
            'password.min' => trans('validation.users.min.password'),
            'email.required' => trans('validation.users.required.email'),
            'email.email' => trans('validation.users.email'),
            'email.exists' => trans('validation.users.exists.email'),
        ];
    }
}
