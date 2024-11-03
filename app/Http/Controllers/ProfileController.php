<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        $first_name = User::where('id', $user->id)->first()->first_name;
        $last_name = User::where('id', $user->id)->first()->last_name;
        $adress = User::where('id', $user->id)->first()->adress;
        $phone = User::where('id', $user->id)->first()->phone;

        return view('profile.index', compact('first_name', 'last_name', 'adress', 'phone'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'adress' => ['required', 'string', 'max:1000'],
            'phone' =>  ['required', 'string', 'max:50']
        ]);

        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        User::where('id', $user->id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'adress' => $validated['adress'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->back();
    }
}
