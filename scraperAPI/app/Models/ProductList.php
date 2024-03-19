<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FavoriteList;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'favorite_list_id',
        'product_id',
    ];

    public function favoriteList() {
        return $this->belongsTo(FavoriteList::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
