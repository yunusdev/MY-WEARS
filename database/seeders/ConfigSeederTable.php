<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Config::updateOrCreate([

            'home_carousel_image_1' => '',
            'home_carousel_image_2' => '',
            'home_carousel_image_3' => '',

            'home_caption_top_1' => 'Puma Backpacks Collection',
            'home_caption_bottom_1' => 'starting at $37.99',
            'home_caption_top_2' => 'Chuck Taylor All Star II',
            'home_caption_bottom_2' => 'for only $59.99',
            'home_caption_top_3' => 'Smart Watch Moto 360 2nd',
            'home_caption_bottom_3' => 'for only $299.99',

            'featured_product' => '8736bd70-826e-11eb-94b7-87bc04206b44',
            'featured_category' => '7155f3f0-80e1-11eb-8bb5-37d65ea58c90',

            'delivery_free' => false,
            'min_amount_free_delivery' => 30000,
            'flat_lagos_delivery_fee' => 1500,
            'flat_farther_lagos_delivery_fee' => 2000,
            'farther_lagos_lgas' => "Ikorodu,Ikeja",
            'flat_outside_lagos_delivery_fee' => 3000,

            'contact_email' => 'contact@mywears.com',
            'contact_phone' => '0806754647484',

        ]);
    }
}
