<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineSubstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_substance', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('medicine_id')->unsigned()->default(1);
            $table->foreign('medicine_id')->references('id')->on('medicines');

            $table->bigInteger('substance_id')->unsigned()->default(1);
            $table->foreign('substance_id')->references('id')->on('substances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_substance');
    }
}
