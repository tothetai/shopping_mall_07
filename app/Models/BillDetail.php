<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class BillDetail extends Model
{
   protected $table = 'bill_detail';
    
   public function product()
   {
      return $this->belongsTo(Product::class);
   }
}
