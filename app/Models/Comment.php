<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Comment extends Model
{
   protected $table = 'comments';

   public function product()
   {
      return $this->belongsTo(Product::class);
   }
}
