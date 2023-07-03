<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hootlex\Friendships\Traits\Friendable;

class User extends Model
{
    use Friendable;

    use HasFactory;
}


