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
        Schema::create('properties', function (Blueprint $table) {
            $table->string('property_identifier');
            $table->id();
            $table->string('property_name');
            $table->string('property_location');
            $table->point('location');
            $table->integer('number_of_floors');
            $table->string('MPESA_pay_bill')->default('Paybill Number: 4024157, Account Number: House Number');
            $table->string('Bank Deposit')->default('To Be Provided on Request');
            $table->timestamps();
        });
        DB::statement("ALTER SEQUENCE properties_id_seq RESTART WITH 101;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
