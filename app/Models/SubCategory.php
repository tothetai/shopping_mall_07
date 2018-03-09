<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class SubCategory extends Model
{
   protected $table = 'sub_category';

   public function Category()
   {
      return $this->belongsTo(Category::class);
   }
}
