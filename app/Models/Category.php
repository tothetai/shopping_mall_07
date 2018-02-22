<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SubCategory;

class Category extends Model
{
   protected $table = 'category';
    
   public function subCat()
   {
      return $this->hasMany(SubCategory::class);
   }
}
