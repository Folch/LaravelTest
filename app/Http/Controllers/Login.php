<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordDB = User::where('email', $email)->get(['password'])->first()['attributes']['password'];

        if (password_verify($password, $passwordDB)) {
            // Authentication passed...
            $response['code'] = 'OK';
        } else {
            $response['code'] = 'ER';
        }
        return json_encode($response);
    }
}
