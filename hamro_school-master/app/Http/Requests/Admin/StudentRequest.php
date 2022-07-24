<?php

namespace App\Http\Requests\Admin;

use App\Http\Services\User\StudentService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * StudentRequest constructor.
     * @param StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
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
                'nullable',
                'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    if($this->student) {
                        $student = $this->studentService->findOrFail($this->student);
                        return $query->where('id', '!=', $student->user_id);
                    }
                    return;
                })
            ],
            'user.username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($query) {
                    if($this->student) {
                        $student = $this->studentService->findOrFail($this->student);
                        return $query->where('id', '!=', $student->user_id);
                    }
                    return;
                })
            ],
            'user.password' => [
                'required',
                'min:8',
                'confirmed'
            ],
            'user.phone' => 'nullable',
            'parent_name' => 'nullable',
            'school_id' => 'required',
            'grade_id' => 'required',
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
            'user.email.unique' => 'The email field has already been taken',
            'user.email.email' => 'The email field must be valid email address',
            'user.username.required' => 'The username field is required',
            'user.username.unique' => 'The username field has already been taken',
            'user.password.required' => 'The password field is required',
            'user.password.confirmed' => 'The password field and confirm password field does not match.',
            'user.password.min' => 'The password field must be at least 8 characters',
            'user.profile.mimes' => 'Please select image file',
            'school_id.required' => 'The school field is required',
            'grade_id.required' => 'The grade field is required',
        ];
    }
}
