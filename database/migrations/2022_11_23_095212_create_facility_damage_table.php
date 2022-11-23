<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityDamageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_damage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bap_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->text('description');
            $table->timestamps();

            $table->foreign('bap_id')
                ->references('id')
                ->on('baps')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_damage');
    }
}
