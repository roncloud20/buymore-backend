<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // 
    function register(Request $request) {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();
        return $user;
    }

    function login(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            return $user;
        } else {
            return ['error' => 'Invalid Login Details'];
        }
        
    }
}
