<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'old_password' => 'required|check_current_password',
            'password' => 'required|confirmed|different:old_password',
        ];
    }

    /**
     * Return validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'old_password.required' => 'Please fill in the blank',
            'old_password.check_current_password' => 'Old password does not match',
            'new_password.required' => 'Please fill in the blank',
            'new_password.different' => 'Current password cannot set as new password',
        ];
    }
}
