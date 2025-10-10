<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'excerpt' => 'required|string|min:8',
            'content' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }
}
