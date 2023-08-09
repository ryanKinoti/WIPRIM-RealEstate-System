<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->unsigned();
            $table->enum('property_floor', ['G_Flr', '1st_Flr', '2nd_Flr', '3rd_Flr', '4th_Flr']);
            $table->string('house_number_on_property');
            $table->integer('house_rent_price');
            $table->integer('garbage_fees');
            $table->enum('status', ['occupied', 'vacant', 'under renovation'])->default('vacant');
            $table->timestamps();

            //relationships
            $table->foreign('property_id')->references('id')->on('properties');
        });
        DB::statement("ALTER SEQUENCE house_units_id_seq RESTART WITH 101;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_units');
    }
};
