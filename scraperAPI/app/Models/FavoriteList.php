<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsToMany(Product::class, 'product_lists');
    }
}
