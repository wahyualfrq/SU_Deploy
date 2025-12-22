<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah'
            ]);
        }

        $user = Auth::user();

        // 🔑 INI KUNCI UTAMA
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('tickets.purchase');
    }



    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => explode('@', $request->email)[0],
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Registrasi berhasil',
                'user' => $user
            ]);
        }

        return redirect()->route('tickets.purchase');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
