<?php

namespace App\Http\Requests\Members;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
            'physical_address' => ['string'],
            'coordinates' => ['string'],
            'email' => ['nullable', 'email', Rule::unique('members', 'email')],
            'mobile' => ['sometimes'],
            'telephone' => ['sometimes'],
            'fax' => ['sometimes'],
            'membership_type' => ['required'],
            'password' => ['nullable'],
            'city_id' => ['integer', 'nullable'],
            'hospital_id' => ['integer', 'nullable'],
        ];
    }
}
