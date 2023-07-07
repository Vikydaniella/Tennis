<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tennis extends Model
{
    use HasFactory;
    protected $fillable = ['tournament_name', 'tournament_point','number_of_players', 'user_id'];

    public function user_id()
    {
        return $this->belongsTo('App\User');
    }
}