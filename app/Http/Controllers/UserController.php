<?php
Project\unioneWeb\app\Http\Controllers\UserController.php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $enrolledCourses = $user->enrolledCourses()->latest()->take(3)->get();
        return view('profile.index', compact('user', 'enrolledCourses'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->user_id.',user_id',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'profile_'.time().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('photos/profiles'), $filename);
            $user->foto = $filename;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}