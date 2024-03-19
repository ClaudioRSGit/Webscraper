<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscribeCode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'user_id',
        'isValid'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
