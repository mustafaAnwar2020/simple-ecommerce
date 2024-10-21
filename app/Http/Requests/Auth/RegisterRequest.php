<?php

namespace App\Http\Requests\Auth;

use App\Enums\DialingCodes;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => [
                'required',
                'string',
                'unique:users,phone',
                function ($attr, $value, $fail) {
                    if (!preg_match("/^[5|0|3|6|4|9|1|8|7]\d{7}$/", $value)) {
                        $fail(__('validation.admins.phone.invalid'));
                    }
                }
            ],
            'dialing_code' => 'required|string|max:255|in:' . implode(',', DialingCodes::getAllValues()),
            'password' => 'required|string|min:8|max:20|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => trans('validation.users.required.password'),
            'password.min' => trans('validation.users.min.password'),
            'email.email' => trans('validation.users.email'),
            'email.unique' => trans('validation.users.unique.email'),
            'phone.unique' => trans('validation.users.unique.phone'),
            'phone.required' => trans('validation.users.required.phone'),
            'country_id.required' => trans('validation.users.required.country_id'),
            'country_id.integer' => trans('validation.users.integer.country_id'),
            'country_id.exists' => trans('validation.users.exists.country_id'),
        ];
    }
}
