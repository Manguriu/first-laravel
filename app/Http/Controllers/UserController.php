<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //show register and create form
    public function register()
    {
        return view('users.register');
    }

    //store or create a new user
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:5',
        ]);
        //has password hidding password
        $formfields['password'] = bcrypt($formfields['password']);

        //create user
        $user = User::create($formfields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'user created succesfully');
    }
    //user log out
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'logout succes');
    }

    // login
    public function login()
    {
        return view('users.login');
    }

    //user auth
    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with("message", "login successful");
        }

        return back()->withErrors(['email' => 'inavalid credentials'])->onlyInput('email');
    }
}
