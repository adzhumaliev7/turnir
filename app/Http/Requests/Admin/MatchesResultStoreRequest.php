<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MatchesResultStoreRequest extends FormRequest
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
            'place_pts' => 'required|integer',
            'tournamentGroupTeamsId' => 'required|exists:tournament_group_teams,id',
            'matches' => 'required|array',
            'matches.*' => 'array',
            'matches.*.*' => 'array',
            'matches.*.*.team_id'  => 'required|exists:tournaments_members,id',
            'matches.*.*.match_id' => 'required|exists:tournament_matches,id',
            'matches.*.*.kills_pts' => 'required|integer',
        ];
    }
}
