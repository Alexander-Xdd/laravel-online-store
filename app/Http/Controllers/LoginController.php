<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request) // :RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $asd = $request->input('email');
        //$user = User::query();

        if (Auth::attempt($credentials)) {
            session(['email' => $asd]);

            if (User::where('email', $asd)->first()->isadmin == 1)
            {
                sleep(1);
                return redirect()->route('admin.index');
            }

            sleep(1);
            return redirect()->route('products');
            //return redirect()->intended('products');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
