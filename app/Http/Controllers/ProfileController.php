<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer:0')->only(['converttoemployer']);
    }
    public function index(Request $req)
    {
        return view('pages.profile.index', ['user' => $req->user()]);
    }
    public function edit(Request $req)
    {
        return view('pages.profile.edit', ['user' => $req->user()]);
    }

    public function update(Request $req)
    {
        $data = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required|digits_between:10,15',
            'bio' => 'string|min:10|max:255',
        ]);

        if ($req->file('profile_picture')) {
            $path = $req->file('profile_picture')->store('public/profile_pictures');
            $data['profile_picture_url'] = str_replace('public', '/storage', $path);
        }

        $req->user()->update($data);

        return redirect('/profile/edit')->with("success", 'profile was updated successfully');

    }
    public function changepassword(Request $req)
    {
        $req->validate([
            'oldpass' => 'required',
            'newpass' => 'required|min:4|max:20',
        ]);

        if (!Hash::check($req->oldpass, $req->user()->password)) {
            return redirect("/profile?modal=password")->withInput()->withErrors(['oldpass' => "password wrong"])->onlyInput('oldpass');
        }
        $req->user()->update(['password' => Hash::make($req->newpass)]);

        return redirect('/profile')->with("success", 'password was updated successfully');
    }
    public function converttoemployer(Request $req)
    {
        $req->user()->update(['is_employer' => true]);
        return redirect('/employer/dashboard')->with("success", 'account was converted successfully to employer account');
    }
}