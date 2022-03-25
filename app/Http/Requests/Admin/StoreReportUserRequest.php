<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreReportUserRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'ban_id' => 'required',
            'date' => 'required',
            'description' => 'nullable|string|max:2000'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
            'date' => Carbon::now(),
        ]);
    }
}
