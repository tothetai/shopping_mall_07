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
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if( Auth::attempt(['email' => $email, 'password' => $password, 'role' => [1,2] ])) {
                return redirect()->intended('admin/homes');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
        
    }

}

}    

