<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductMarketPrice;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_market_price_id',
        'avg_price',
        'collected_at'
    ];

    public function productMarketPrice() {
        return $this->belongsTo(ProductMarketPrice::class);
    }
}
