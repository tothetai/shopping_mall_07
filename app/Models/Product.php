<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BillDetail;
use App\Models\Comment;
use App\Models\Size;
use App\Http\Requests\AddProductRequest;
use DB;

class Product extends Model
{
<<<<<<< HEAD
    protected $table = 'products';

    public function billDetail()
    {
        return $this->belongsTo(BillDetail::class);
    }

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

=======
   protected $table = 'products';
   protected $guarded =[];

   public function billDetail()
   {
      return $this->belongsTo(BillDetail::class);
   }

   public function comment()
   {
      return $this->hasMany(Comment::class);
   }

   public function size()
   {
      return $this->hasMany(Size::class);
   }

   public function scopegetProduct($data)
    {
        return $data = DB::table('sub_category')->join('products','products.sub_id','=','sub_category.id')->orderBy('products.id','desc');
    }

>>>>>>> category subcategory product
}
