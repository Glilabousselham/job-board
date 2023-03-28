<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        return $this->loginAction(...$credentials);
    }

    public function signUp(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:20|confirmed',
            'password_confirmation' => 'required',
        ]);

        unset($data['password_confirmation']);
        $oldPass = $data['password'];
        $data['password'] = \Hash::make($data['password']);

        User::create($data);

        return $this->loginAction($data['email'], $oldPass);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    private function loginAction(string $email, string $password)
    {
        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            request()->session()->regenerate();
            return redirect('/');
        }
        return redirect('/login')->withErrors(['email' => 'The provided email do not match our records.'])->onlyInput('email');
    }
}