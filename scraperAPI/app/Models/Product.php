<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PriceHistory;
use App\Models\ProductMarketPrice;
use App\Models\Market;
use App\Models\Image;
use App\Models\PriceNotification;
use App\Models\FavoriteList;
use App\Models\Rating;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'brand',
        'avg_rating',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function productMarketPrices() {
        return $this->hasMany(ProductMarketPrice::class);
    }
    
    public function image(){
        return $this->hasMany(Image::class);
    }

    public function priceNotifications() {
        return $this->hasMany(PriceNotification::class);
    }

    public function favoriteLists() {
        return $this->belongsToMany(FavoriteList::class, 'product_lists');
    }

    public function priceHistories() {
        return $this->hasMany(PriceHistory::class);
    }

    public function marketPrices() {
        return $this->belongsToMany(Market::class, 'product_market_prices');
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }
}
