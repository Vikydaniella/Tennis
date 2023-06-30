<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'tournament_name'=> 'required|string|max:20',
            'win_points'=> 'required|integer|max:5',
            'draw_points'=> 'required|integer|max:3',
            'loss_point'=> 'required|integer|max:0'
        ];
    }
}