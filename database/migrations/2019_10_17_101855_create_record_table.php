<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attention_id')->unsigned();
            
            $table->text('symptom')->nullable();
            $table->text('history')->nullable();
            $table->text('physiological_background')->nullable();
            $table->text('pathological_background')->nullable();
            $table->text('physical_exam')->nullable();
            $table->text('auxiliary_exams')->nullable();
            $table->text('treatment')->nullable();
            $table->text('instruction')->nullable();
            $table->timestamps();

            $table->foreign('attention_id')->references('id')->on('attentions')
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
        Schema::dropIfExists('records');
    }
}
