<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatchFormRequest extends Request
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
            //
            'home_team' => 'required',
            'guest_team' => 'required|different:home_team',
            'home_ratio' => 'required|integer|min:1|max:9|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'guest_ratio' => 'required|integer|min:1|max:9|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'tie_ratio' => 'required|integer|min:1|max:9|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'start_time' => 'required|after:bet_time',
            'end_time' => 'required|after:start_time',
            'bet_time' => 'required|after:now',
        ];
    }
}
