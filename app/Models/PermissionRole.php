<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    // declaration
     protected $fillable = [
        'role_id',
        'permission_id',
    ] ;
}
