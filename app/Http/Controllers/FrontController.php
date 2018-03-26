<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\LoginRequest;
Use Mail\SendMail;
use App\Http\Requests;
use Validator;
use DB;
use Mail;
use Cart;
use Auth;

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

        return view('pages.home', compact('pro_dis', 'pros','cart'));
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
            Cart::destroy();
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
        $comment = DB::table('comments')
            ->join('user_table','comments.user_id_comment','=','user_table.id')->where('prod_id', $req->id)
            ->select('comments.content', 'commentS.created_at', 'user_table.name' ,'user_table.avatar')->get();
        $product = Product::where('id', $req->id)->first();
        $pros =  Product::new()->get();
        $prodis = Product::product()->get();

        return view('pages.productDetail', compact('product', 'pros', 'prodis','comment'));
    }

    public function seach(Request $request){
        $tk=$request->timkiem;
        $search=Product::where('name','like',"%$tk%")
            ->orwhere('price','like',"%$tk%")->get();
        return view('pages.search')
        ->with('tk',$tk)
        ->with('search',$search);
    }

    public function getcatpro($id){
        $cat_pro = Product::where('sub_id', $id)->get();
        return view('pages.CategoryProduct', compact('cat_pro'));
    }

    public function postComment(Request $req){
        // return $req->all();
        Comment::create([
            'prod_id' => $req->productId,
            'user_id_comment' => $req->userId,
            'content' => $req->content,
        ]);
        
        return response()->json(['status' => 1]);
    }

}
