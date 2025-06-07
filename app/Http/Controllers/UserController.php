<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->user_id.',user_id',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::delete('public/photos/profiles/' . $user->avatar);
            }
            
            $foto = $request->file('foto');
            $filename = 'profile_'.time().'.'.$foto->getClientOriginalExtension();
            $foto->storeAs('public/photos/profiles', $filename);
            $user->avatar = $filename;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save;

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}