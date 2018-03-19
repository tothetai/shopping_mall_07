<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use DB;

class SubCategory extends Model
{
   protected $table = 'sub_category';
   protected $guarded =[];

   public function Category()
   {
      return $this->belongsTo(Category::class);
   }

   public function scopegetSubCate($data)
   {
   	return $data = DB::table('categories')->join('sub_category','sub_category.cat_id','=','categories.id')->orderBy('sub_category.id','desc');
   }
}
