<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|string|unique:posts,title',
            'description' => 'required|string',
            'content' => 'required|string',
            'is_published' => 'required|boolean',
            'images' => 'array|nullable',
            'images.*' => 'file|mimes:jpeg,jpg,png,gif|nullable',
            'category' => 'required|exists:model_has_category,id',
        ];
    }
}
