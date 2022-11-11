<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compass;
use App\Models\User;

class UserController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function senarai_user(Request $request) {
        $users = User::all();
        return view('users', compact('users'));
    }    
}
