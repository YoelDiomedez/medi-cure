<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_record', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('diagnosis_id')->unsigned();
            $table->bigInteger('record_id')->unsigned();

            $table->enum('type', ['P', 'D', 'R'])->comment('P (presuntivo) D (definitivo) R (repetido)');
            
            $table->timestamps();

            $table->foreign('diagnosis_id')->references('id')->on('diagnoses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('record_id')->references('id')->on('records')
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
        Schema::dropIfExists('diagnosis_record');
    }
}
