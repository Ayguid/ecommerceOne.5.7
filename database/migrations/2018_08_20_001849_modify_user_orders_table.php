<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('user_orders', function (Blueprint $table) {

             $table->integer('order_status_code')->nullable()->change();
             $table->integer('payment_method_code')->nullable()->change();
             $table->integer('payment_confirmation_number')->nullable()->change();
             $table->integer('shipping_method_code')->nullable()->change();
             $table->date('order_placed_datetime')->nullable()->change();
             $table->date('order_delivered_datetime')->nullable()->change();
             $table->float('order_shipping_charges')->nullable()->change();
             $table->string('other_order_details')->nullable()->change();

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
