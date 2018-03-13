<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SubCategory;

class Category extends Model
{
   protected $table = 'categories';
   protected $primaryKey = 'cate_id';
   protected $guarded =[];
    
   public function subCat()
   {
      return $this->hasMany(SubCategory::class, 'cat_id', 'id');
   }
}
