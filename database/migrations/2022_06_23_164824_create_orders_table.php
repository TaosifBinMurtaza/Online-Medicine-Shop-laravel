<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //$table->dropForeign('orders_c_id_foreign');
            //$table->dropColumn('c_id');
            //$table->dropForeign('orders_d_id_foreign');
            //$table->dropColumn('d_id');

            $table->increments('order_id');
            $table->integer('c_id')->unsigned();
            $table->integer('d_id')->unsigned();
            $table->string('status',10);

            $table->foreign('c_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('d_id')->references('delman_id')->on('deliverymans')->onUpdate('cascade')->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); 

        Schema::dropIfExists('orders');
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}