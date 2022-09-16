<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'      => 'required',
            'password'      => 'required'
        ];

        $messages = [
            'email.required'     => 'Email wajib diisi',
            'password.required'     => 'Password wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $remember = $request->has('remember') ? true : false;

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data, $remember);

        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->withInput()->withErrors(['error' => 'Email or Password are Invalid!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
