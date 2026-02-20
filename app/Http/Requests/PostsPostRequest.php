<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsPostRequest extends FormRequest
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
            'title' => 'bail|required|max:255|unique:post_schema|min:3',
            'author' => 'bail|required|max:255|min:3|unique:post_schema',
            'description' => 'bail|required|max:255|min:3|unique:post_schema',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'The field is required.',
            'author.required' => 'The field is required.',
            'description.required' => 'The field is required.',
            'title.unique' => 'The field must be unique.',
            'author.unique' => 'The field must be unique.',
            'description.unique' => 'The field must be unique.',
            'title.max' => 'The field must be less than 255 characters.',
            'title.min' => 'The field must be at least 3 characters.',
            'author.max' => 'The field must be less than 255 characters.',
            'author.min' => 'The field must be at least 3 characters.',
            'description.max' => 'The field must be less than 255 characters.',
            'description.min' => 'The field must be at least 3 characters.',
        ];
    }
}
