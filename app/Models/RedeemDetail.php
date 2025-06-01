<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_exchange_id',
        'user_id',
        'reward',
        'point_cost',
        'coupon_code',
        'full_name',
        'address',
        'phone',
    ];

    public function pointExchange()
    {
        return $this->belongsTo(PointExchange::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
