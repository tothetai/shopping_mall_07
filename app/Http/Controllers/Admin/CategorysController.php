<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use DB;

class CategorysController extends Controller
{
    //
    public function getCate(){
    	$data['catelist']= DB::table('categories')->paginate(2);
    	return view('backend.category',$data);
    }
    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category ->cat_name =$request->name;
    	$category ->cat_slug =str_slug($request->name);
    	$category ->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate'] =Category::find($id);
    	return view('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
    	$category =Category::find($id);
    	$category ->cat_name =$request->name;
    	$category ->cat_slug =str_slug($request->name);
    	$category ->save();
    	return redirect()->intended('admin/category');
    }
    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back();
    }
}
