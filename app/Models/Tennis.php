<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tennis extends Model
{
    use HasFactory;
    protected $fillable = ['tournament_name', 'tournament_point','number_of_players'];

    public function tennis()
    {
        return $this->hasManyThrough(
            '\App\Models\Points',
            '\App\Models\Results',
            '\App\Models\TennisPointsResults',
            'tennis_id',
            'id',
            'id',
            'points_id'

        );
    }
}