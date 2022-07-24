<?php

namespace App\Http\Requests\Discussion;

use Illuminate\Foundation\Http\FormRequest;

class DiscussionRequest extends FormRequest
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
        if(isset($this->visibility_status) || isset($this->comment_status)){
            return [];
        }
        return [
            'title' => 'required',
//            'description' => 'required',
            'subject_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required',
            'description.required' => 'The description field is required',
            'subject_id.required' => 'The subject field is required',
        ];
    }
}
