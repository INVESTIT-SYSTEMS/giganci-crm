<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wplogin');
    }

    public function store(Request $request)
    {
//        $data = $request->validate([
//        'login'=>'required',
//        'password'=>'required',
//    ]);

        $data = $request->only([
            'login',
            'password'
        ]);

        if (Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended(route('main.index'));
        }
            return redirect()->intended(route('login.index'))->with('send', 'Wprowadzono niepoprawne dane.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }

    public function show()
    {
        return view('wplogin');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
