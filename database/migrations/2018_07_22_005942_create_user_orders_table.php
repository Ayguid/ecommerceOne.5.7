<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('order_status_code');
            $table->integer('payment_method_code');
            $table->integer('payment_confirmation_number');
            $table->integer('shipping_method_code');
            $table->date('order_placed_datetime');
            $table->date('order_delivered_datetime');
            $table->float('order_shipping_charges');
            $table->string('other_order_details');
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
        Schema::dropIfExists('user_orders');
    }
}
