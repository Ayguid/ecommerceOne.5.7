<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserOrderTableWithPremise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('user_orders', function (Blueprint $table) {
              $table->integer('billing_premise_id')->nullable();
              $table->integer('shipping_premise_id')->nullable();
              $table->integer('order_status_code')->default(1)->change();


         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
