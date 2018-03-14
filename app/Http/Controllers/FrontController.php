<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

use App\Http\Requests;

class FrontController extends Controller
{
    public function __construct(){
        $data = [
            'category' => Category::all(),
            'slide' => Product::where('new', '<>', 0)->get()
        ];
        view()->share('data',$data);
    }

    public function homepage(){
        $pro_dis =  Product::discount()->get();      
        $pros = Product::product()-> get();
        
        return view('pages.home', compact('pro_dis', 'pros'));
    }

    public function getRegister(){
        return view('pages.register');
    }

    public function postRegister(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->pass),
            'role' => 0,
            'avatar' => "",
        ]);

        return view('pages.login')->with('message','Đăng ký tài khoản thành công!');
    }

    public function getlogin(){
        return view ('pages.login');
    }

    public function postlogin(Request $request){

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($login)){
           return redirect('homepage');
        }
        else
        {
            return redirect('login')->with('message',' Email hoặc password sai !');
        }
    }

    public function Logout(){
        Auth::logout();

        return redirect('homepage');
    }

    public function products(){
        $product = Product::all();

        return view('pages.product')->with('product', $product);
    }

    public function productDetail( Request $req){
        $product = Product::where('id', $req->id)->first();
        $pros =  Product::new()->get();
        $prodis = Product::product()->get();

        return view('pages.productDetail', compact('product', 'pros', 'prodis'));
    }
}
