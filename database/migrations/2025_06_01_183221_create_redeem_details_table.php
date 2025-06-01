<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('redeem_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('point_exchange_id'); // relasi ke point_exchanges
            $table->unsignedBigInteger('user_id');
            $table->string('reward');
            $table->integer('point_cost');
            $table->string('coupon_code')->nullable();
            $table->string('full_name');
            $table->text('address');
            $table->string('phone');
            $table->timestamps();

            // foreign key constraint
            $table->foreign('point_exchange_id')->references('id')->on('point_exchanges')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('redeem_details');
    }
}
