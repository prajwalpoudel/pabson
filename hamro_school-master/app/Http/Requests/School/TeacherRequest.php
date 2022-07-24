<?php

namespace App\Http\Requests\School;

use App\Http\Services\User\TeacherService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var TeacherService
     */
    private $teacherService;

    /**
     * TeacherRequest constructor.
     * @param TeacherService $teacherService
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
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
        if (isset($this->user['is_verified'])) {
            return [];
        }
        return [
            'user.first_name' => 'required',
            'user.last_name' => 'required',
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    if ($this->teacher) {
                        $teacher = $this->teacherService->findOrFail($this->teacher);
                        return $query->where('id', '!=', $teacher->user_id);
                    }
                    return;
                })
            ],
            'user.username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($query) {
                    if ($this->teacher) {
                        $teacher = $this->teacherService->findOrFail($this->teacher);
                        return $query->where('id', '!=', $teacher->user_id);
                    }
                    return;
                })
            ],
            'user.address' => 'nullable',
            'user.phone' => 'required',
            'subject_id' => 'required',
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
            'user.username.required' => 'The user name field is required',
            'user.username.unique' => 'The user name field has already been taken',
            'user.phone.required' => 'The phone field is required',
            'user.profile.mimes' => 'Please select image file',
            'subject_id.required' => 'The subject field is required',
        ];
    }
}
