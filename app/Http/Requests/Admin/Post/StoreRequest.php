<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'main_image' => 'required|image',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Значение должно быть текстом',

            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Значение должно быть текстом',

            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.image' => 'Загружаемый файл должен быть изображением',

            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.image' => 'Загружаемый файл должен быть изображением',

            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Значение должно быть числовым',
            'category_id.exists' => 'Выбраная категория не существует',

            'tags.array' => 'Теги должны быть представленны массивом',
            'tags.*.integer' => 'Теги должны быть числами',
            'tags.*.exists' => 'Такого тега не существует',
        ];
    }
}
