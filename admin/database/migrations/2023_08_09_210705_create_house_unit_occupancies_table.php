<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_unit_occupancies', function (Blueprint $table) {
            $table->bigInteger('house_unit_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('date_of_occupancy')->nullable();
            $table->date('date_of_vacancy')->nullable();
            $table->timestamps();

            //relationships
            $table->foreign('house_unit_id')->references('id')->on('house_units');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_unit_occupancies');
    }
};
