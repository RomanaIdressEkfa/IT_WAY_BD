<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust authorization logic if needed
    }

    public function rules()
    {
        return [
            'skill' => 'required|string|unique:skills|max:255', // Define validation rules
        ];
    }

    public function messages()
    {
        return [
            'skill.required' => 'Skill is required.', // Custom error messages
            'skill.string' => 'Skill must be a string.',
            'skill.unique' => 'Skill already exists.',
            'skill.max' => 'Skill cannot exceed 255 characters.',
        ];
    }
}
