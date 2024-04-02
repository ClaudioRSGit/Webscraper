<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\WishList;

class Product_WishList extends Model
{
    protected $table = 'product_wishlist';

    protected $fillable = [
        'wishlist_id', 
        'product_id'
    ];

    public function wishlist()
    {
        return $this->belongsTo(WishList::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
