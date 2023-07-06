<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    
    public function rules()
    {
        return [  
            'player_one_score'=> 'required|integer|max:50',
            'player_two_score'=> 'required|integer|max:50',
            'winner'=> 'required|string|max:20'
        ];
    }
}