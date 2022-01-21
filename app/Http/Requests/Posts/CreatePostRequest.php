<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required',
            'headline' => 'nullable',
            'content' => 'nullable',
            'category_id' => 'required',
            'published_at' => 'nullable',
            'media' => 'nullable',
            'media_type' => 'nullable',
        ];
    }
}