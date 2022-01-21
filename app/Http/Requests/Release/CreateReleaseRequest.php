<?php

namespace App\Http\Requests\Release;

use Illuminate\Foundation\Http\FormRequest;

class CreateReleaseRequest extends FormRequest
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
            'content' => 'nullable',
            'video_link' => 'nullable',
            'published_at' => 'nullable',
        ];
    }
}
