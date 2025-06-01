<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointExchange extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'reward', 'amount', 'points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
