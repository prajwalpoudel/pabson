<?php

namespace App\Http\Requests\Admin;

use App\Http\Services\User\GuardianService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParentRequest extends FormRequest
{
    /**
     * @var GuardianService
     */
    private $guardianService;

    /**
     * ParentRequest constructor.
     * @param GuardianService $guardianService
     */
    public function __construct(GuardianService $guardianService)
    {

        $this->guardianService = $guardianService;
    }

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
        if(isset($this->user['is_verified'])) {
            return [];
        }
        return [
            'user.first_name' => 'required',
            'user.last_name' => 'required',
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    if($this->parent) {
                        $parent = $this->guardianService->findOrFail($this->parent);
                        return $query->where('id', '!=', $parent->user_id);
                    }
                    return;
                })
            ],
            'user.address' => 'required',
            'user.phone' => 'required',
            'school_id' => 'required',
            'user.profile' => 'sometimes|mimes:jpg,jpeg,png,svg',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'user.first_name.required' => 'The first name field is required',
            'user.last_name.required' => 'The last name field is required',
            'user.email.required' => 'The email field is required',
            'user.email.unique' => 'The email field has already been taken',
            'user.email.email' => 'The email field must be valid email address',
            'user.address.required' => 'The address field is required',
            'user.phone.required' => 'The phone field is required',
            'user.profile.mimes' => 'Please select image file',
            'school_id.required' => 'The school field is required',
        ];
    }
}
