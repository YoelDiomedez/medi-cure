<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attention_id')->unsigned();

            $table->string('drug');                     // corticosteroid 
            $table->float('amount', 8, 2);              // 20
            $table->string('shape');                    // tabs
            $table->float('dose', 8, 2)->nullable();    // 1 (tab)
            $table->string('route');                    // PO (by mouth)
            $table->string('frequency');                // Q8h (every 8 hours)
            $table->string('term');                     // A week
            $table->string('note')->nullable();         // obs

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
        Schema::dropIfExists('prescriptions');
    }
}
