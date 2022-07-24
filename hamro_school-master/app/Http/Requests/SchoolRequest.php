<?php

namespace App\Http\Requests;

use App\Http\Services\User\SchoolService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
{
    /**
     * @var SchoolService
     */
    private $schoolService;

    /**
     * SchoolRequest constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @param SchoolService $schoolService
     */
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

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
        if (isset($this->user['is_verified'])) {
            return [];
        }
        return [
            'user.first_name' => 'nullable',
            'user.last_name' => 'nullable',
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    if ($this->school) {
                        $school = $this->schoolService->findOrFail($this->school);
                        return $query->where('id', '!=', $school->user_id);
                    }
                    return;
                })
            ],
            'user.username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($query) {
                    if ($this->school) {
                        $school = $this->schoolService->findOrFail($this->school);
                        return $query->where('id', '!=', $school->user_id);
                    }
                    return;
                })
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
//            'user.first_name.required' => 'The first name field is required',
//            'user.last_name.required' => 'The last name field is required',
//            'user.address.required' => 'The address field is required',
//            'user.phone.required' => 'The phone field is required',
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
