<?php

namespace App\Http\Requests\Admin\Academics;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
        return [
            'grade_id' => 'sometimes|integer',
            'name' => 'required',
            'image'=>'sometimes|image',
            'grades'=>'sometimes|array',
            'grades.*'=>'sometimes|integer'
        ];
    }
}