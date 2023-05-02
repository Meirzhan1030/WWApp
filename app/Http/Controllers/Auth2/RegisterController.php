<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|max:225|unique:users',
            'password' => 'required|min:6|confirmed',
            'ava' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);

        $fileName = time().$request->file('ava')->getClientOriginalName();
        $photo_path = $request->file('ava')->storeAs('avatars', $fileName, 'public');

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'ava' => '/storage/'.$photo_path,
        ]);

        Auth::login($user);

        return redirect()->route('forums.index');
    }
}
