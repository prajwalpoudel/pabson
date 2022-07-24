<?php

namespace App\Http\Requests\School;

use App\Http\Services\UserService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardianRequest extends FormRequest
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * TeacherRequest constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->where(function ($query) {
                    if ($this->guardian) {
                        $user = $this->userService->findOrFail($this->guardian);
                        return $query->where('id', '!=', $user->id);
                    }
                    return false;
                })
            ],
            'address' => 'required',
            'phone' => 'required',
        ];
    }
}
