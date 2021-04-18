<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('home_carousel_image_1')->nullable();
            $table->string('home_carousel_image_2')->nullable();
            $table->string('home_carousel_image_3')->nullable();

            $table->string('home_caption_top_1');
            $table->string('home_caption_bottom_1');
            $table->string('home_caption_top_2');
            $table->string('home_caption_bottom_2');
            $table->string('home_caption_top_3');
            $table->string('home_caption_bottom_3');

            $table->string('featured_product')->nullable();
            $table->string('featured_category')->nullable();

            $table->boolean('delivery_free')->nullable()->default(false);
            $table->unsignedBigInteger('min_amount_free_delivery');
            $table->unsignedBigInteger('flat_lagos_delivery_fee');
            $table->unsignedBigInteger('flat_farther_lagos_delivery_fee');
            $table->string('farther_lagos_lgas');
            $table->unsignedBigInteger('flat_outside_lagos_delivery_fee');

            $table->string('contact_email');
            $table->string('contact_phone');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
