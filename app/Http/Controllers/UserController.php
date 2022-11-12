<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
        $user = $request->user();
        $auth_user = true;
        $friend = User::where('username', $username)->first();
        if($friend) {
            if ($user) {
                $auth_user = true;
                return view('friend', compact('friend', 'auth_user'));
            } else {
                $auth_user = false;
                return view('friend', compact('friend', 'auth_user'));
            }            
        }        
    }      

    public function muka_friend(Request $request) {
        $user = $request->user();
        $upline = User::find($user->introducer_id);
        $downlines = User::where('introducer_id', $user->id)->get();
        return view('friends', compact('user', 'upline', 'downlines'));
    }   
    
    public function register_student(Request $request) {
        
        $request->validate([
            'introducer_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $compass = New Compass;
        $compass->user_id = $user->id;
        $compass->compass_type = "broken";
        $compass->compass_rarity = "common";
        $compass->save();        
        
        $user->compass_id = $compass->id;
        $user->save();    
        
        return back();
    }
}
