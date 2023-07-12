<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;
    protected $fillable = ['tournament_id','player_one_score','player_two_score', 'winner', 'user_id'];

    public function user_id()
    {
        return $this->belongsTo('App\User');
    }
}