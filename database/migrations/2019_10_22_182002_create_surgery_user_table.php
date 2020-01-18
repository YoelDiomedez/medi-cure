<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgeryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('surgery_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('surgery_id')->references('id')->on('surgeries')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surgery_user');
    }
}
