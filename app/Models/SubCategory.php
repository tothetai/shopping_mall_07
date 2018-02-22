<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class SubCategory extends Model
{
   protected $table = 'subcategory';

   public function Category()
   {
      return $this->belongsTo(Category::class);
   }
}
