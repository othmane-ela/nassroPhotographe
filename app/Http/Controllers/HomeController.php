<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function edit()
    {
        return view('profile.index')->with('user',auth()->user());
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password','password_confirmation');

        if(!$request->filled('password'))
        {
           $user->fill($input)->save();
           return back()->with('success_message','Profile modifié avec succès');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message','Profile (Mot de passe) modifié avec succès');

    }
}
