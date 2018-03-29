<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\MessageBag;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request) {

        $logins = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($logins)){

            return redirect('backend.index');

        }
        else
        {
            return redirect('login')->with('message',' Email hoặc password sai !');
        }
        
    }
}