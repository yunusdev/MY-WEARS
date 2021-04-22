<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $appends = ['farther_lagos_lg'];


    protected $fillable = ['home_carousel_image_1', 'home_carousel_image_2','home_link_1', 'home_link_2', 'home_link_3',
        'home_carousel_image_3', 'home_caption_top_1', 'home_caption_bottom_1',
        'home_caption_top_2', 'home_caption_bottom_2', 'home_caption_bottom_3', 'home_caption_top_3',
        'featured_product', 'featured_category', 'delivery_free', 'min_amount_free_delivery', 'flat_lagos_delivery_fee',
        'flat_farther_lagos_delivery_fee', 'farther_lagos_lgas', 'flat_outside_lagos_delivery_fee',
        'contact_email', 'contact_phone'];

    public function category(){

        return $this->belongsTo(Category::class, 'featured_category');

    }

    public function product(){

        return $this->belongsTo(Product::class, 'featured_product');

    }

    public function getFartherLagosLgAttribute(){

        return explode(',', $this->farther_lagos_lgas);

    }
}
