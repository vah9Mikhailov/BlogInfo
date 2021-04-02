<?php

namespace App\Http\Requests;

use App\Models\Post\Entity\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->id;
        return [
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'thumbnail' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Название поста занято, назовите по-другому',
            'thumbnail.image' => 'Формат изображения должен быть другой. Например, jpg или png'
        ];
    }
}
