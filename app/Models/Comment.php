<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = [
        'prod_id',
        'user_id_comment',
        'content',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_comment', 'id');
    }
}
