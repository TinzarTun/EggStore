<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // declaration
     protected $fillable = [
        'name',
        'slug',
    ] ;
}
