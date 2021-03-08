<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginPost(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('dashboard'));
        } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('user'));
        } else {
            //Gagal Login
            alert()->error('Password atau Email, Salah !', 'Gagal Login !');
            return redirect()->route('login')->with('alert', 'Password atau Email, Salah !');
        }
    }

    public function registerPost(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:users|min:4|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6',
                'alamat' => 'required|min:6',
                'no_hp' => 'required|unique:users|regex:/(08)[0-9]{10}/',
            ]
        );

        $user = new Users();
        $user->name = ucwords($request->name);
        $user->address = ucwords($request->address);
        $user->number_phone = $request->number_phone;
        $user->email = ucwords($request->email);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        return redirect()->route('login')->with('alert', 'You are already out');
    }
}
