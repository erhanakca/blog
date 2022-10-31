<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|string',
            'content' => 'required|max:1000|string',
            'image_url' => 'required|url',
            'category_id' => 'nullable|numeric',
            'manuel_add' => 'nullable|max:20|string'
        ];
    }
}
