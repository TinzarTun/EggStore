<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    // declaration
     protected $fillable = [
        'user_id',
        'role_id',
    ] ;
}
