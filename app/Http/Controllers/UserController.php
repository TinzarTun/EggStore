<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // get create
    public function getCreate(){
        return view("admin.user.create");
    }
}
