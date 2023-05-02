<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = null;
        if ($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->
            orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users]);
    }

    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back();
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

    public function profile(){
        return view('auth.profile', ['user' => User::all()]);
    }

    public function updateInfo(Request $request, User $user){
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|max:225',
            'ava' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ]);

        $fileName = time().$request->file('ava')->getClientOriginalName();
        $photo_path = $request->file('ava')->storeAs('avatars', $fileName, 'public');
        $validated['ava'] = '/storage/'.$photo_path;

        $user->update($validated);
        return back()->with('message', 'Profile updated');
    }


}
