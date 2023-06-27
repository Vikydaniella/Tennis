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
            'tournament_name'=> 'required|string|max:20',
            'tournament_point'=> 'required|integer|max:20',
            'number_of_players'=> 'required|integer|max:2'
        ];
    }
}