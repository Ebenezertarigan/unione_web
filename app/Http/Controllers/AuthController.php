<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Contoh user dummy
        $validUser = [
            'email' => 'admin@example.com',
            'password' => 'admin123'
        ];

        if ($request->email === $validUser['email'] && $request->password === $validUser['password']) {
            // Simpan ke session
            session(['user' => $request->email]);
            return redirect()->route('courses.index');
        }

        return back()->with('error', 'Email atau Password salah');
    }

}
