<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->input('user_id'),
            'role' => 'required|integer|min:0|max:1',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'В этом поле должна находиться строка',

            'email.required' => 'Это поле обязательно для заполнения',
            'email.string' => 'В этом поле должна находиться строка',
            'email.eamil' => 'Не валидная почта',
            'email.unique' => 'Эта почта уже занята',

            'role.required' => 'Это поле обязательно для заполнения',
            'role.integer' => 'В этом поле должно находиться число',
            'role.min' => 'Значение поля :attribute должно быть больше :min',
            'role.max' => 'Значение поля :attribute должно быть меньше :min',
        ];
    }
}
