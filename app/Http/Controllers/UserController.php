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
    
    public function satu_friend(Request $request) {
        $username = $request->route('username');
        $user = User::where('username', $username)->first();
        if($user) {
            return view('friend', compact('user'));
        }        
    }      

    public function muka_friend(Request $request) {
        $user = $request->user();
        $upline = User::find($user->introducer_id);
        $downlines = User::where('introducer_id', $user->id)->get();
        return view('friends', compact('user', 'upline', 'downlines'));
    }    
}
