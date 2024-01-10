<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "password" => "required"
            ]
        );
        if ($validator->fails())
        {
            return redirect('/admin')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        }

        $credential = $request->only('email','password');

        if(Auth::attempt($credential)){
            return redirect ('admin/users');
        }

        else{
            $validator->errors()->add('password',"Your Credential is not valid");
            return redirect('/admin')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        }

    }
}
