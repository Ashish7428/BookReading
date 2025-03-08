<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('user')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Static credentials check
        if ($email === 'demo@gmail.com' && $password === 'demo@123') {
            Session::put('user', [
                'email' => $email,
                'name' => 'Demo User'
            ]);
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')
            ->with('error', 'Invalid email or password. Please try again.');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }

    public function showChangePasswordForm()
    {
        return view('dashboard.change-password');
    }

    public function changePassword(Request $request)
    {
        // Add password change logic here
        return redirect()->route('dashboard')
            ->with('success', 'Password changed successfully.');
    }

    public function showChangeNameForm()
    {
        return view('dashboard.change-name');
    }

    public function changeName(Request $request)
    {
        $user = Session::get('user');
        $user['name'] = $request->input('name');
        Session::put('user', $user);

        return redirect()->route('dashboard')
            ->with('success', 'Name changed successfully.');
    }
} 