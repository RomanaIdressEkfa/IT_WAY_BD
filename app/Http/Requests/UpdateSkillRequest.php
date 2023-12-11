<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
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
            'skill' => 'required|string', // Define validation rules
        ];
    }

    public function messages()
    {
        return [
            'skill.required' => 'Skill is required.', // Custom error messages
            'skill.string' => 'Skill must be a string.',
        ];
    }
}
