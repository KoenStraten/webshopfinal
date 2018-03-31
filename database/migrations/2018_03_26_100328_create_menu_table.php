<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('link')->default('#');
            $table->string('icon')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('order')->nullable();
            $table->string('position');
            $table->string('role')->nullable();
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('role')->references('role')->on('user_roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
