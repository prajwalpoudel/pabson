<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrincipalRequest extends FormRequest
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
        // Ignore email unique validation while updating school
        //For temporary check only
        //until authentication
        $array = explode('/', request()->url());
        $count = count($array);
        $id = $array[$count - 2];

        return [
            'first_name'            => 'required',
            'last_name'             => 'required',
            'address'               => 'required',
            'phone'                 => 'required',
            'email'                 => [
                'required',
                'email',
                'confirmed',
                Rule::unique('users')->ignore($id)
//                'unique:users',
            ],
            'email_confirmation'    => 'required|email',
//            'password'              => 'required|confirmed',
//            'password_confirmation' => 'required',
            'profile'               => 'sometimes|mimes:jpg,jpeg,png,svg',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'         => 'Please fill in the blank',
            'last_name.required'          => 'Please fill in the blank',
            'address.required'            => 'Please fill in the blank',
            'phone.required'              => 'Please fill in the blank',
            'email.required'              => 'Please fill in the blank',
            'email.email'                 => 'Please input valid email',
            'email.confirmed'             => 'Email confirmation does not match',
            'email.unique'                => 'Email already exists',
            'email_confirmation.required' => 'Please fill in the blank',
            'email_confirmation.email'    => 'Please enter valid email',
            'profile.mimes'               => 'Please select image file',
        ];
    }
}
