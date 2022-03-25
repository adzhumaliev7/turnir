<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class joinTurnaments extends FormRequest
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
            'members' => 'array|required|min:3|max:4|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'members.array' => 'Должен быть в виде массива',
            'members.*.required' => 'Участники должны быть обязательны',
            'members.min' => 'Для добавление нужно минимум 3 участника',
            'members.max' => 'Для добавление нужно максимум 4 участника',
            'members.*.exists' => 'Ошибка значение id пользователя должно существовать в базе данных',
        ];
    }
}
