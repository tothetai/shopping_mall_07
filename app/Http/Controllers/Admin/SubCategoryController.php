<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\AddSubCateRequest;
use App\Http\Requests\EditSubCateRequest;
use DB;
class SubCategoryController extends Controller
{
    //
    public function getSubCate(){
<<<<<<< HEAD
        $data['subcatelist'] = DB::table('sub_category')->join('categories','sub_category.cat_id','=','categories.cate_id')->orderBy('sub_id','desc')->get();
=======
        // $data['subcatelist'] = DB::table('categories')->join('sub_category','sub_category.cat_id','=','categories.id')->orderBy('sub_category.id','desc')->get();
        $data['subcatelist'] = SubCategory::getSubCate()->get();
>>>>>>> Category Subcategory Product
        return view('backend.subcategory',$data);
    }
    public function getAddSubCate(){
        $data['catelist']= Category::all();
        return view('backend.addsubcate',$data);
    }
    public function postAddSubcate(AddSubCateRequest $request){
    	$subcategory = new SubCategory;
    	$subcategory ->cat_id =$request->cate;
        $subcategory ->sub_name =$request->name;
    	$subcategory ->save();
    	return redirect('admin/subcategory');
    }
     public function getEditSubCate($id){
        $data['subcate'] = SubCategory::find($id);
        $data['catelist'] = Category::all();
        return view('backend.editsubcate',$data);
    }
    public function postEditSubCate(EditSubCateRequest $request,$id){
        // $subcategory =new SubCategory;
        // $arr['sub_name'] = $request->name;
        // $arr['cat_id'] =$request->cate;
        // $subcategory::where('sub_id',$id)->update($arr);
        $subcategory =SubCategory::find($id);
        $subcategory->sub_name= $request->name;
        $subcategory->cat_id = $request->cate;
        $subcategory->save();
        return redirect()->intended('admin/subcategory');
    }
    public function getDeleteSubCate($id){
        SubCategory::destroy($id);
        return back();
    }
}
