<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TennisRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'tournament_name'=> 'required|string|max:20',
            'tournament_point'=> 'required|integer|max:20',
            'number_of_players'=> 'required|integer|max:2',
            'user_id'=> 'required|integer|max:10'
        ];
    }
}