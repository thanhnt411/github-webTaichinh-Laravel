<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntroduceRequest extends FormRequest
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
            'heading' => 'required|string|min:5',
            'sub_heading' => 'required|string|min:5',
            'content' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,video/webm|max:102400',
            'video_title'  => 'required|string|min:5'
        ];
    }
}
