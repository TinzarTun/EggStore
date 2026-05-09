<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // declaration
     protected $fillable = [
        'name',
        'slug',
    ] ;
}
