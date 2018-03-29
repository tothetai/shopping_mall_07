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
    // $data['productlist'] = DB::table('sub_category')->join('products','products.sub_id','=','sub_category.id')->orderBy('products.id','desc')->get();
        $data['productlist']= Product::getProduct()->paginate(4); 
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['subcatelist']= SubCategory::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
        //$product = new Product();
        $filename= $request->img->getClientOriginalName();
            $product = Product::create([
            'name' => $request->name,
            'pro_slug' => str_slug($request->name),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount,
            'img' => $filename,
            'promotion' => $request->promotion,
            'condition' => $request->condition,
            'status' => $request->status,
            'description' => $request->description,
            'featured' => $request->featured,
            'new' => $request->new,
            'sub_id' => $request->subcate,
        ]);
        

        $request->img->storeAs(config('custom.defaultimgs'), $filename);
        //$product = new Product;
        // $product->name = $request->name;
        // $product->pro_slug =str_slug($request->name);
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->discount = $request->discount;
        // $product->img = $filename;
        // $product->promotion = $request->promotion;
        // $product->condition = $request->condition;
        // $product->status = $request->status;
        // $product->description = $request->description;
        // $product->featured = $request->featured;
        // $product->new = $request->new;
        // $product->sub_id = $request->subcate;
        // $product->save();
        $request->img->storeAs(config('custom.defaultimgs'), $filename);
        return redirect('admin/product'); 
    }
    public function getEditProduct($id){
        $data['product']= Product::find($id);
        $data['sublistcate'] = SubCategory::all();
        return view('backend.editproduct',$data);
    }
    public function postEditProduct(AddProductRequest $request,$id){
        $product = new Product();
        $arr['name'] = $request->name;
        $arr['price'] = $request->price;
        $arr['promotion'] = $request->promotion;
        $arr['condition'] = $request->condition;
        $arr['status'] = $request->status;
        $arr['description'] = $request->description;
        $arr['sub_id'] = $request->subcate;
        $arr['featured'] = $request->featured;
        if($request->Hasfile('img')){
        $img = $request->img->getClientOriginalName();
        $arr['img'] = $img;
        $request->img->storeAs('public/avatar',$img);
        }
        $product::where('id',$id)->update($arr);
        return redirect('admin/product');
        }
        public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}