<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'phone' => '',
            'fio' => '',
            'login' => '',
            'email' => '',
            'country' => '',
            'timezone' => '',
            'city' => '',
            'bdate' => '',
            'nickname' => '',
            'game_id' => ''
        ];
    }
}
