<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function loginAdmin()
    {
        // The user is logged in...\
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user()->delete_at;
            return redirect(route('home'));
        }
        return redirect(route('admin.loginAdmin'));
    }
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
