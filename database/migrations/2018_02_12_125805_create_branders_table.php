<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('branders_name')->unique();
            $table->string('branders_group');
            $table->string('branders_type');
            $table->text('branders_image');
            $table->integer('branders_status')->default('0');
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
        Schema::dropIfExists('branders');
    }
}
