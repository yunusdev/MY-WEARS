<?php

namespace App\Models;

use App\Contracts\CouponContract;
use App\Traits\Filterable;
use App\Traits\uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Traits\EnumeratesValues;

//use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, uuids, Filterable;

    protected $appends = ['formatted_date', 'incoming_amount'];

    protected $fillable = [
        'tracking_number', 'number_of_items', 'user_created', 'shipped','country', 'sub_total_amount', 'total_amount', 'delivery_fee', 'name', 'email',
        'user_id', 'coupon_id', 'coupon_discount', 'ref', 'phone', 'state', 'lga', 'address', 'settled', 'comment'
    ];

    public function getFormattedDateAttribute()
    {

        return $this->created_at ? $this->created_at->format('F dS, Y') : '';

    }


    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function getIncomingAmountAttribute()
    {

        return $this->total_amount -  $this->delivery_fee;

    }

    public function orderItems()
    {

        return $this->hasMany(OrderItem::class);

    }


}
