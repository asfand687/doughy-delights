<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login (Request $req){
        $user = User::where(['email' => $req->email])->first();
        if($user && Hash::check($req->password, $user->password)) {
            $req->session()->put('user', $user);
            return redirect('/');
        } else {
            return 'Username and Password did not match';
        }
    }

    function signup(Request $req) {
        $hash = Hash::make($req->input()['password']);
        $user = new User;
        $user->name = $req->input()['name'];
        $user->email = $req->input()['email'];
        $user->password = $hash;
        $user->save();
        $req->session()->put('user', $user);
        return redirect('/');
    }
}
