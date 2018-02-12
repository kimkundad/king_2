<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branders_id');
            $table->integer('user_id');
            $table->string('shop_name')->unique();
            $table->text('shop_address');
            $table->string('shop_phone');
            $table->string('shop_email');
            $table->integer('provience_id');
            $table->text('lat');
            $table->text('lng');
            $table->float('shop_sale', 8, 2);
            $table->integer('shop_code');
            $table->text('channel');
            $table->text('shop_area');
            $table->text('image_shop');
            $table->text('detail_shop');
            $table->integer('shop_status')->default('0');
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
        Schema::dropIfExists('shops');
    }
}
