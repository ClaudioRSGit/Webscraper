<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
    ];
    
    public function productMarketPrice()
    {
        return $this->hasMany(ProductMarketPrice::class);
    }
}
