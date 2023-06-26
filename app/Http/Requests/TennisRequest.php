<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TennisRequest extends FormRequest
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
            'tournament_name'=> 'required|max:255',
            'tournament_point'=> 'required|max:255',
            'number_of_players'=> 'required|max:255'
        ];
    }
}