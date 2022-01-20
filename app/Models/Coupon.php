<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['expires_in'];

    protected $appends = ['expires_format', 'redeemed_count'];

    public function users()
    {

        return $this->belongsToMany(User::class, 'coupon_user')->withTimestamps()->orderBy('created_at', 'DESC');
    }

    public function orders()
    {

        return $this->belongsToMany(Order::class, 'coupon_user')->withTimestamps()->orderBy('created_at', 'DESC');
    }

    public function getRedeemedCountAttribute()
    {

        return $this->orders()->count();
    }

    public function getExpiresFormatAttribute()
    {

        return $this->expires_in ? $this->expires_in->diffForHumans() : null;
    }

    public static function timestamp($timestamp)
    {
        return Carbon::createFromTimestampUTC($timestamp)->timezone('UTC');
    }

    public static function isPast($timestamp)
    {
        $timestamp = static::timestamp($timestamp);

        return $timestamp->isPast();
    }
}
