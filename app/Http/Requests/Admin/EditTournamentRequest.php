<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditTournamentRequest extends FormRequest
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
            'name' => '',
            'format' => '',
            'country' => '',
            'timezone' => '',
            'countries' => '',
            'description' => '',
            'start_reg' => '',
            'price' => '',
            'end_reg' => '',
            'start_reg_time' => '',
            'end_reg_time' => '',
            'slot_kolvo' => '',
            'ligue' => '',
            'rule' => '',
            'header' => '',
            'tournament_start' => '',
            'games_time' => '',  
        ];
    }
}
