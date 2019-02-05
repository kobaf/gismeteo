<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test()
    {
        return "Users controller works";
    }

    public function list()
    {
        return view('users.list');
    }
}
