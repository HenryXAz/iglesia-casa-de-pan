<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'identifier' => 'string|max:100',
            'is_active' => 'boolean',
            'name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'optional_info' => 'boolean',
            'phone_number' => 'string|max:20|nullable',
            'address' => 'string|max:255|nullable',
            'birthday' => 'date|nullable',
            'dpi' => 'string|max:16|nullable',
        ];
    }
}
