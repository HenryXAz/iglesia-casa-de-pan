<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'identifier' => 'required|string|max:100|unique:users',
            'type' => 'required|string',
            'is_active' => 'required|boolean',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'optional_info' => 'required|boolean',
            'phone_number' => 'string|max:20|nullable',
            'address' => 'string|max:255|nullable',
            'birthday' => 'date|nullable',
            'dpi' => 'string|max:16|nullable',
        ];
    }
}
