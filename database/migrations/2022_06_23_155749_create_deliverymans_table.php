<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverymansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverymans', function (Blueprint $table) {
                $table->increments('delman_id');
                $table->string('delman_name',35);
                $table->string('delman_email',30)->unique();
                $table->string('delman_mob',15)->unique();
                $table->string('delman_dob',25);
                $table->string('delman_nid',15)->unique();
                $table->string('delman_add',70);
                $table->string('password',60);
                $table->string('image')->nullable()->default('default.png');
                $table->string('status',15)->default('available');
               // $table->timestamp('email_verified_at')->nullable();
                //$table->rememberToken();
               // $table->timestamps();
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Schema::dropIfExists('deliveryman');

       // DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}