<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Market;
use App\Models\Product;
use App\Models\PriceHistory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMarketPrice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'market_id',
        'product_id',
        'price',
        'link',
        'currency',
        'tag'
    ];
    public function market() {
        return $this->belongsTo(Market::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function priceHistory() {
        return $this->hasMany(PriceHistory::class);
    }
}
