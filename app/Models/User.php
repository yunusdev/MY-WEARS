<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, uuids, Filterable;

    public $incrementing = false;

    protected $appends = ['formatted_date', 'orders_count'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //    public function getAddressAttribute(){
    //
    //        return $this->address();
    //
    //    }

    public function coupons()
    {

        return $this->belongsToMany(Coupon::class, 'coupon_user')->withTimestamps()->orderBy('created_at', 'DESC');
    }

    public function address()
    {

        return $this->hasOne(UserAddress::class);
    }

    public function wishlists()
    {

        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    public function getFormattedDateAttribute()
    {

        return $this->created_at->format('F dS, Y');
    }

    public function orders()
    {

        return $this->hasMany(Order::class);
    }

    public function getOrdersCountAttribute()
    {

        return $this->orders()->count();
    }
}
