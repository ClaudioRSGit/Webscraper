<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class WishList extends Model
{
    protected $table = 'wishlists';
    
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_wishlist', 'wishlist_id', 'product_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
