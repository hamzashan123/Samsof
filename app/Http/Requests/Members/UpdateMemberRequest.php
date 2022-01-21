<?php

namespace App\Http\Requests\Members;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'active' => ['sometimes'],
            'published' => ['sometimes'],
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'address' => ['string', 'nullable'],
            'alt_address' => ['nullable', 'string'],
            'coordinates' => ['string'],
            'email' => ['nullable', 'email', Rule::unique('members', 'email')->ignore($this->member->id)],
            'practice_email' => ['nullable', 'email'],
            'mobile' => ['sometimes'],
            'telephone' => ['sometimes'],
            'alt_telephone' => ['sometimes'],
            'membership_type' => ['required'],
            'city_id' => ['integer', 'nullable'],
        ];
    }
}
