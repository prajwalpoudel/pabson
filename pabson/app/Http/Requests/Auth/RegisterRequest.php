<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'user.username' => [
                'required',
                Rule::unique('users', 'username')
            ],
            'user.password' => [
                'required',
                'confirmed'
            ],
            'user.password_confirmation' => 'required',
            'name' => 'required',
            'principal_name' => 'required',
            'principal_email' => [
                'nullable',
                'email'
            ],
            'phone' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'municipality_id' => 'required',
            'ward_number' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user.email.required' => 'The email field is required',
            'user.email.unique' => 'The email field has already been taken',
            'user.email.email' => 'The email field must be valid email address',
            'user.username.required' => 'The username field is required',
            'user.username.unique' => 'The username field has already been taken',
            'user.password.required' => 'The password field is required',
            'user.password.confirmed' => 'The password field and confirm password field does not match.',
            'user.password_confirmation.required' => 'The password confirmation field is required',
            'user.password.min' => 'The password field must be at least 8 characters',
            'principal_name.required' => 'The principal name field is required',
            'province_id.required' => 'The province field is required',
            'district_id.required' => 'The district field is required',
            'municipality_id.required' => 'The municipality field is required',
            'ward_number' => 'The ward number field is required.',
        ];
    }
}
