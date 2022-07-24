<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolUpdateRequest extends FormRequest
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
            'user.first_name' => 'nullable',
            'user.last_name' => 'nullable',
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(frontUser())
            ],
            'user.username' => [
                'required',
                Rule::unique('users', 'username')->ignore(frontUser())
            ],
            'user.address' => 'nullable',
            'user.phone' => 'nullable',
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
            'ward_number' => 'required',
            'logo' => 'sometimes|mimes:jpg,jpeg,png,svg',
        ];
    }

    public function messages(): array
    {
        return [
            'user.email.required' => 'The email field is required',
            'user.email.unique' => 'The email field has already been taken',
            'user.email.email' => 'The email field must be valid email address',
            'user.username.required' => 'The username field is required',
            'user.username.unique' => 'The username field has already been taken',
            'name.required' => 'The name field is required',
            'principal_name.required' => 'The principal name field is required',
            'principal_email.email' => 'The principal email must be valid email address',
            'phone.required' => 'The phone field is required',
            'province_id.required' => 'The province field is required',
            'district_id.required' => 'The district field is required',
            'municipality_id.required' => 'The municipality field is required',
            'ward_number' => 'The ward number field is required.',
            'logo.mimes' => 'Please select image file',
        ];

    }
}
