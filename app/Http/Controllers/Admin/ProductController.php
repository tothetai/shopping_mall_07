<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\AddProductRequest;
use DB;

class ProductController extends Controller
{
    //
    public function getProduct(){
<<<<<<< HEAD
          $data['productlist'] = DB::table('products')->join('sub_category','products.subs_id','=','sub_category.sub_id')->orderBy('pro_id','desc')->get();
=======
          // $data['productlist'] = DB::table('sub_category')->join('products','products.sub_id','=','sub_category.id')->orderBy('products.id','desc')->get();
        $data['productlist']= Product::getProduct()->get(); 
>>>>>>> Category Subcategory Product
    	return view('backend.product',$data);
    }
    public function getAddProduct(){
    	$data['subcatelist']= SubCategory::all();
    	return view('backend.addproduct',$data);
    }
<<<<<<< HEAD
=======

>>>>>>> Category Subcategory Product
    public function postAddProduct(AddProductRequest $request){
    	$filename= $request->img->getClientOriginalName();
    	$product = new Product;
    	$product->name = $request->name;
    	$product->pro_slug =str_slug($request->name);
    	$product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount = $request->discount;
    	$product->img = $filename;
    	$product->promotion = $request->promotion;
    	$product->condition = $request->condition;
    	$product->status = $request->status;
    	$product->description = $request->description;
    	$product->featured = $request->featured;
        $product->new = $request->new;
<<<<<<< HEAD
    	$product->subs_id = $request->subcate;
    	$product->save();
    	$request->img->storeAs('public/avatar',$filename);
        return redirect('admin/product');
=======
    	$product->sub_id = $request->subcate;
    	$product->save();
    	$request->img->storeAs('public/avatar',$filename);
        return redirect('admin/product'); 
        
>>>>>>> Category Subcategory Product
    }
    public function getEditProduct($id){
    	$data['product']= Product::find($id);
        $data['sublistcate'] = SubCategory::all();
<<<<<<< HEAD
    	return view('backend.editproduct',$data); 
    }
=======
    	return view('backend.editproduct',$data);
    }
    
>>>>>>> Category Subcategory Product
    public function postEditProduct(AddProductRequest $request,$id){
        $product = new Product();
        $arr['name'] = $request->name;
        $arr['price'] = $request->price;
        $arr['promotion'] = $request->promotion;
        $arr['condition'] = $request->condition;
        $arr['status'] = $request->status;
        $arr['description'] = $request->description;
<<<<<<< HEAD
        $arr['subs_id'] = $request->subcate;
=======
        $arr['sub_id'] = $request->subcate;
>>>>>>> Category Subcategory Product
        $arr['featured'] = $request->featured;
        if($request->Hasfile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['img'] = $img;
            $request->img->storeAs('public/avatar',$img);
        }
<<<<<<< HEAD
        $product::where('pro_id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id){
         SubCategory::destroy($id);
=======
        $product::where('id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id){
        Product::destroy($id);
>>>>>>> Category Subcategory Product
        return back();
    }
}
