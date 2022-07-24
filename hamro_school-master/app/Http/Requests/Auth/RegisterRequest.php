<?php

namespace App\Http\Requests\Auth;

use App\Constants\RoleConstant;
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
     * @return array
     */
    public function rules()
    {
        $role_id = $this->input('role_id');
        $rules = [
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
            'user.password_confirmation' => 'required'
        ];
        if ($role_id == RoleConstant::SCHOOL_ID) {
            $rules = array_merge(
                $rules,
                [
                    'user.email' => [
                        'nullable',
                    ],
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
                ]
            );
        } elseif ($role_id == RoleConstant::TEACHER_ID) {
            $rules = array_merge(
                $rules,
                [
                    'user.firstname' => 'required',
                    'user.lastname' => 'required',
                    'user.phone' => 'required',
                    'subject_id' => 'required',
                    'school_id' => 'required'
                ]
            );
        } elseif ($role_id == RoleConstant::STUDENT_ID) {
            $rules = array_merge(
                $rules,
                [
                    'school_id' => 'required'
                ]
            );
        } elseif ($role_id == RoleConstant::GUARDIAN_ID) {
            $rules = array_merge(
                $rules,
                [
                    'user.firstname' => 'required',
                    'user.lastname' => 'required',
                    'user.phone' => 'nullable',
                    'school_id' => 'required',
                    'grade_id' => 'required',
                ]
            );
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'user.first_name.required' => 'The first name field is required',
            'user.last_name.required' => 'The last name field is required',
            'user.email.required' => 'The email field is required',
            'user.email.unique' => 'The email field has already been taken',
            'user.email.email' => 'The email field must be valid email address',
            'user.username.required' => 'The username field is required',
            'user.username.unique' => 'The username field has already been taken',
            'user.password.required' => 'The password field is required',
            'user.password.confirmed' => 'The password field and confirm password field does not match.',
            'user.password_confirmation.required' => 'The password confirmation field is required',
            'user.password.min' => 'The password field must be at least 8 characters',
            'user.profile.mimes' => 'Please select image file',
            'principal_name.required' => 'The principal name field is required',
            'province_id.required' => 'The province field is required',
            'district_id.required' => 'The district field is required',
            'municipality_id.required' => 'The municipality field is required',
            'ward_number' => 'The ward number field is required.',
            'school_id.required' => 'The school field is required',
            'subject_id.required' => 'The subject field is required',
            'grade_id.required' => 'The grade field is required',
        ];
    }
}
