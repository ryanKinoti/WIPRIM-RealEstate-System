<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('house_unit_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('year');
            $table->enum('month',['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec']);
            $table->string('MPESA_Code');
            $table->string('water_meter_reading');
            $table->timestamps();

            //relationships
            $table->foreign('house_unit_id')->references('id')->on('house_units');
            $table->foreign('user_id')->references('id')->on('users');
        });
        DB::statement("ALTER SEQUENCE payments_id_seq RESTART WITH 101;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
