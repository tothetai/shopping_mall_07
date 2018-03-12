<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use DB;

use App\Http\Requests;

class FrontController extends Controller
{
    function homepage(){
        $cat = Category::all();
        $pro_news = Product::where('new', '<>', 0)->get();
        $pro_dis = Product::where('discount', '<>', 0)->get();
        $pros = Product::where('discount', '<>', 54) -> get();
        
        return view('pages.home')
            ->with('cat', $cat)
            ->with('pro_news', $pro_news)
            ->with('pro_dis', $pro_dis)
            ->with('pros', $pros);
    }
}
