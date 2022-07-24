<?php

namespace App\Http\Requests\Discussion;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        if (isset($this->visibility_status) || isset($this->comment_status)) {
            return [];
        }
        return [
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [];

    }
}
