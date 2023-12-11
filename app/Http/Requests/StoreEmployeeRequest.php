<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:employees',
            'phone_number' => 'nullable|string|max:20|unique:employees',
            'address' => 'nullable|string',
            'image' => 'nullable|file',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 255 characters.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email must not exceed 255 characters.',
            'phone_number.max' => 'The phone number must not exceed 20 characters.',
            'address.string' => 'The address must be a string.',
            'image.file' => 'The image must be a file.',
        ];
    }
}
