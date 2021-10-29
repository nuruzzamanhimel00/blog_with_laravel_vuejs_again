<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:web');
    }

    public function allUsers(){
        $users = User::get();
        return response()->json([
            'users' => $users
        ]);
    }

}
