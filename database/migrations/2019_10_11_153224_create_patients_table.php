<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surnames');
            $table->string('names');
            $table->date('birthdate');
            $table->enum('gender', ['M', 'F'])->comment('M (masculino) F (femenino)');
            $table->enum('marital_status', ['S', 'C', 'V', 'D'])->comment('S (solter@) C (casad@) V (viud@) D (divorciad@)');
            $table->enum('document_type', ['DNI', 'RUC', 'P. NAC.', 'CARNET EXT.', 'PASAPORTE', 'OTRO'])->comment('EXT.(EXTRANJERIA) P. NAC.(PARTIDA DE NACIMIENTO)');
            $table->char('document_numb', 15)->unique();
            $table->string('allergies')->nullable();
            $table->boolean('vaccines')->nullable();
            $table->char('cellphone_num', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('profession')->nullable();
            $table->string('relative')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('patients');
    }
}
