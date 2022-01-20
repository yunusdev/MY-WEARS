<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'payment_logs', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('user_id')->nullable();
                $table->string('order_id')->nullable();
                $table->bigInteger('amount');
                $table->string('currency')->default('NGN')->nullable();
                $table->string('ref');
                $table->string('gateway')->default('Paystack');
                $table->string('name');
                $table->string('email');
                $table->boolean('user_created')->default(true);

                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_logs');
    }
}
