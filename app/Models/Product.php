<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BillDetail;
use App\Models\Comment;
use App\Models\Size;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddProductRequest;
use DB;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded =[];
    protected $fillable = ['name', 'pro_slug','price','quantity','discount','discount','promotion','condition','status','description','featured','new','sub_id','img'];
   
    public function billDetail()
    {
        return $this->belongsTo(BillDetail::class);
    }
    
  /*  public function sub_product()
    {
        return $this->belongsTo(SubCategory::class, 'sub_id', 'id');
    }*/

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

    public function scopeDiscount($query)
    {
        return $query->where('discount', '>', 0);
    }

    public function scopeProduct($query)
    {
        return $query->where('discount', '>', 54);
    }

    public function scopeNew($query)
    {
        return $query->where('new', '>', 0);
    }

   public function scopegetProduct($data)
    {
        return $data = DB::table('sub_category')->join('products','products.sub_id','=','sub_category.id')->orderBy('products.id','desc');
    }

    
}
