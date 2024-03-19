<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FavoriteList;
use App\Models\PriceNotification;
use App\Models\Rating;
use App\Models\Role;
use App\Models\SearchHistory;
use App\Models\SubscribeCode;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'email', 
        'password',
        'isActive',
        'role_id'
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function favoriteList() {
        return $this->hasMany(FavoriteList::class);
    }

    public function priceNotification() {
        return $this->hasMany(PriceNotification::class);
    }

    public function rating() {
        return $this->hasMany(Rating::class);
    }

    public function searchHistory() {
        return $this->hasMany(SearchHistory::class);
    }

    public function subscribeCode(){
        return $this->hasMany(SubscribeCode::class);
    }
}
