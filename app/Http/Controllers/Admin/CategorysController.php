<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use DB;

class CategorysController extends Controller
{
    public function getCate(){
    	$data['catelist']= DB::table('categories')->paginate(4);
    	return view('backend.category',$data);
    }
    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category ->cat_name =$request->name;
    	$category ->save();
    	return redirect() -> route('postCate')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
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
    	$data['productlist'] = DB::table('sub_category')->join('categories','sub_category.cat_id','=','categories.id');
        $parent = SubCategory::where('cat_id',$id)->count();
        if($parent == 0){
            Category::destroy($id);
            return redirect() -> route('showcate')->with(['flash_level' => 'success','flash_message' => 'Xóa thành công']);
        }
        else{
            echo '
                <script type ="text/javascript">
                    alert("Xin lỗi!Bạn không được Xóa");
                    window.location = "';
                    echo route('showcate');
            echo '"
                </script>';
        }  
    }
}
